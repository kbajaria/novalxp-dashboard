#!/usr/bin/env bash
set -euo pipefail

MODE="${1:-}"
ENV_NAME="${2:-}"

if [[ -z "$MODE" || -z "$ENV_NAME" ]]; then
  echo "Usage: $0 <check|apply> <dev|test|prod>"
  exit 1
fi

if [[ "$MODE" != "check" && "$MODE" != "apply" ]]; then
  echo "Invalid mode: $MODE"
  exit 1
fi

case "$ENV_NAME" in
  dev) HOST="dev-moodle-ec2" ;;
  test) HOST="test-moodle-ec2" ;;
  prod) HOST="prod-moodle-ec2" ;;
  *)
    echo "Invalid environment: $ENV_NAME (use dev|test|prod)"
    exit 1
    ;;
esac

ROOT_DIR="$(cd "$(dirname "$0")/.." && pwd)"

if [[ "$MODE" == "apply" ]]; then
  BACKUP_DIR="$ROOT_DIR/artifacts/deploy/${ENV_NAME}-backups"
  mkdir -p "$BACKUP_DIR"
  TS="$(date -u +"%Y%m%dT%H%M%SZ")"
  BLOCK_BACKUP_FILE="$BACKUP_DIR/dashboard_tags_blocks_pre_remove_${TS}.tsv"
  USER_PAGES_BACKUP_FILE="$BACKUP_DIR/dashboard_user_pages_pre_reset_${TS}.tsv"

  cat <<'PHP' | ssh "$HOST" php > "$BLOCK_BACKUP_FILE"
<?php
define('CLI_SCRIPT', true);
require '/var/www/moodle/public/config.php';

$sql = "SELECT bi.id,
               bi.blockname,
               bi.pagetypepattern,
               bi.subpagepattern,
               bi.defaultregion,
               bi.defaultweight,
               bi.timemodified,
               bp.id AS positionid,
               bp.region,
               bp.weight,
               bp.visible AS positionvisible
          FROM {block_instances} bi
     LEFT JOIN {block_positions} bp
            ON bp.blockinstanceid = bi.id
           AND bp.pagetype = bi.pagetypepattern
           AND bp.subpage = bi.subpagepattern
         WHERE bi.blockname = :blockname
           AND bi.pagetypepattern = :pagetype
           AND bi.subpagepattern = :subpage
      ORDER BY bi.id";

$params = [
    'blockname' => 'tags',
    'pagetype' => 'my-index',
    'subpage' => '2',
];

$rows = $DB->get_records_sql($sql, $params);
foreach ($rows as $row) {
    echo implode("\t", [
        $row->id,
        $row->blockname,
        $row->pagetypepattern,
        $row->subpagepattern,
        $row->defaultregion,
        $row->defaultweight,
        $row->timemodified,
        $row->positionid ?? '',
        $row->region ?? '',
        $row->weight ?? '',
        $row->positionvisible ?? '',
    ]), "\n";
}
PHP

  cat <<'PHP' | ssh "$HOST" php > "$USER_PAGES_BACKUP_FILE"
<?php
define('CLI_SCRIPT', true);
require '/var/www/moodle/public/config.php';
require_once($CFG->dirroot . '/my/lib.php');

$privatepage = defined('MY_PAGE_PRIVATE') ? MY_PAGE_PRIVATE : 1;

$rows = $DB->get_records_select(
    'my_pages',
    'private = :private AND userid IS NOT NULL',
    ['private' => $privatepage],
    'id ASC',
    'id,userid,name,private'
);

foreach ($rows as $row) {
    echo implode("\t", [
        $row->id,
        $row->userid,
        $row->name,
        $row->private,
    ]), "\n";
}
PHP

  echo "Block backup saved: $BLOCK_BACKUP_FILE"
  echo "User dashboard backup saved: $USER_PAGES_BACKUP_FILE"
fi

REMOTE_CMD="MODE='$MODE' php"

cat <<'PHP' | ssh "$HOST" "$REMOTE_CMD"
<?php
define('CLI_SCRIPT', true);
require '/var/www/moodle/public/config.php';
require_once($CFG->dirroot . '/my/lib.php');

$mode = getenv('MODE') ?: 'check';
$pt = 'my-index';
$sp = '2';
$now = time();
$privatepage = defined('MY_PAGE_PRIVATE') ? MY_PAGE_PRIVATE : 1;

$instances = $DB->get_records('block_instances', [
    'blockname' => 'tags',
    'pagetypepattern' => $pt,
    'subpagepattern' => $sp,
], 'id ASC');

$count = count($instances);

if ($count === 0) {
    echo "OK\tmessage=no-tags-block-on-default-dashboard\n";
    if ($mode !== 'apply') {
        exit(0);
    }
} else {
    foreach ($instances as $instance) {
        $position = $DB->get_record('block_positions', [
            'blockinstanceid' => $instance->id,
            'pagetype' => $pt,
            'subpage' => $sp,
        ]);
        $region = $position ? $position->region : $instance->defaultregion;
        $weight = $position ? (int)$position->weight : (int)$instance->defaultweight;
        echo "FOUND\tid={$instance->id}\tregion={$region}\tweight={$weight}\n";
    }

    if ($mode !== 'apply') {
        exit(2);
    }

    $tx = $DB->start_delegated_transaction();
    foreach ($instances as $instance) {
        $positions = $DB->get_records('block_positions', ['blockinstanceid' => $instance->id], 'id ASC');
        foreach ($positions as $position) {
            $DB->delete_records('block_positions', ['id' => $position->id]);
        }
        $DB->delete_records('block_instances', ['id' => $instance->id]);
        echo "REMOVED\tid={$instance->id}\n";
    }
    $tx->allow_commit();
}

$beforeuserpages = $DB->count_records_select(
    'my_pages',
    'private = :private AND userid IS NOT NULL',
    ['private' => $privatepage]
);

my_reset_page_for_all_users($privatepage, $pt);
purge_all_caches();

$afteruserpages = $DB->count_records_select(
    'my_pages',
    'private = :private AND userid IS NOT NULL',
    ['private' => $privatepage]
);

echo "RESET\tbefore={$beforeuserpages}\tafter={$afteruserpages}\twhen={$now}\n";
PHP
