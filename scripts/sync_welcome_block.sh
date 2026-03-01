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
SPEC_DIR="$ROOT_DIR/spec/welcome"
TITLE_FILE="$SPEC_DIR/title.txt"
TEXT_FILE="$SPEC_DIR/text.html"
FORMAT_FILE="$SPEC_DIR/format.txt"

for f in "$TITLE_FILE" "$TEXT_FILE" "$FORMAT_FILE"; do
  if [[ ! -f "$f" ]]; then
    echo "Missing spec file: $f"
    exit 1
  fi
done

TITLE_B64="$(base64 < "$TITLE_FILE" | tr -d '\n')"
TEXT_B64="$(base64 < "$TEXT_FILE" | tr -d '\n')"
FORMAT_VALUE="$(tr -d '\r\n' < "$FORMAT_FILE")"

if [[ "$MODE" == "apply" ]]; then
  BACKUP_DIR="$ROOT_DIR/artifacts/deploy/${ENV_NAME}-backups"
  mkdir -p "$BACKUP_DIR"
  TS="$(date -u +"%Y%m%dT%H%M%SZ")"
  BACKUP_FILE="$BACKUP_DIR/welcome_blocks_pre_spec_apply_${TS}.tsv"

  cat <<'PHP' | ssh "$HOST" php > "$BACKUP_FILE"
<?php
define('CLI_SCRIPT', true);
require '/var/www/moodle/public/config.php';

$recs = $DB->get_records_select(
    'block_instances',
    'pagetypepattern = :pt AND blockname = :bn',
    ['pt' => 'my-index', 'bn' => 'html'],
    'id ASC',
    'id,subpagepattern,timemodified,configdata'
);

foreach ($recs as $r) {
    $cfg = @unserialize(base64_decode($r->configdata));
    if (!is_object($cfg)) {
        continue;
    }
    $title = (string)($cfg->title ?? '');
    $text = (string)($cfg->text ?? '');
    $iswelcome = (strpos($title, 'Welcome to NovaLXP') !== false) || (strpos($text, 'Welcome to NovaLXP') !== false);
    if (!$iswelcome) {
        continue;
    }
    echo $r->id, "\t", ($r->subpagepattern ?? 'NULL'), "\t", $r->timemodified, "\t", $r->configdata, "\n";
}
PHP
  echo "Backup saved: $BACKUP_FILE"
fi

REMOTE_CMD="MODE='$MODE' TITLE_B64='$TITLE_B64' TEXT_B64='$TEXT_B64' FORMAT_VALUE='$FORMAT_VALUE' php"

cat <<'PHP' | ssh "$HOST" "$REMOTE_CMD"
<?php
define('CLI_SCRIPT', true);
require '/var/www/moodle/public/config.php';

function norm_text(string $s): string {
    $s = str_replace("\r\n", "\n", $s);
    $s = str_replace("\r", "\n", $s);
    return $s;
}

$mode = getenv('MODE') ?: 'check';
$desiredtitle = rtrim(base64_decode(getenv('TITLE_B64') ?: ''), "\r\n");
$desiredtext = base64_decode(getenv('TEXT_B64') ?: '') ?: '';
$desiredformat = (string)(getenv('FORMAT_VALUE') ?: '1');

$recs = $DB->get_records_select(
    'block_instances',
    'pagetypepattern = :pt AND blockname = :bn',
    ['pt' => 'my-index', 'bn' => 'html'],
    'id ASC',
    'id,subpagepattern,configdata,timemodified'
);

$checked = 0;
$drift = 0;
$updated = 0;

foreach ($recs as $rec) {
    $cfg = @unserialize(base64_decode($rec->configdata));
    if (!is_object($cfg)) {
        continue;
    }

    $title = (string)($cfg->title ?? '');
    $text = (string)($cfg->text ?? '');
    $format = (string)($cfg->format ?? '');

    $iswelcome = (strpos($title, 'Welcome to NovaLXP') !== false) || (strpos($text, 'Welcome to NovaLXP') !== false);
    if (!$iswelcome) {
        continue;
    }

    $checked++;

    $sametitle = ($title === $desiredtitle);
    $sameformat = ($format === $desiredformat);
    $sametext = (norm_text($text) === norm_text($desiredtext));

    if ($sametitle && $sameformat && $sametext) {
        echo "OK\tid={$rec->id}\tsubpage={$rec->subpagepattern}\n";
        continue;
    }

    $drift++;
    echo "DRIFT\tid={$rec->id}\tsubpage={$rec->subpagepattern}\ttitle=" . ($sametitle ? 'ok' : 'diff') . "\tformat=" . ($sameformat ? 'ok' : 'diff') . "\ttext=" . ($sametext ? 'ok' : 'diff') . "\n";

    if ($mode === 'apply') {
        $cfg->title = $desiredtitle;
        $cfg->format = $desiredformat;
        $cfg->text = $desiredtext;
        $rec->configdata = base64_encode(serialize($cfg));
        $rec->timemodified = time();
        $DB->update_record('block_instances', $rec);
        $updated++;
        echo "UPDATED\tid={$rec->id}\n";
    }
}

echo "SUMMARY\tmode={$mode}\tchecked={$checked}\tdrift={$drift}\tupdated={$updated}\n";

if ($mode === 'check' && $drift > 0) {
    exit(2);
}
PHP
