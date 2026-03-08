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
SPEC_DIR="$ROOT_DIR/spec/featured-course"
TITLE_FILE="$SPEC_DIR/title.txt"
TEXT_FILE="$SPEC_DIR/text.html"
FORMAT_FILE="$SPEC_DIR/format.txt"
MARKER="<!-- NovaLXP Dashboard: Featured courses -->"
TARGET_WEIGHT=1

for f in "$TITLE_FILE" "$TEXT_FILE" "$FORMAT_FILE"; do
  if [[ ! -f "$f" ]]; then
    echo "Missing spec file: $f"
    exit 1
  fi
done

TITLE_B64="$(base64 < "$TITLE_FILE" | tr -d '\n')"
TEXT_B64="$(base64 < "$TEXT_FILE" | tr -d '\n')"
FORMAT_VALUE="$(tr -d '\r\n' < "$FORMAT_FILE")"
MARKER_B64="$(printf '%s' "$MARKER" | base64 | tr -d '\n')"

REMOTE_CMD="MODE='$MODE' TITLE_B64='$TITLE_B64' TEXT_B64='$TEXT_B64' FORMAT_VALUE='$FORMAT_VALUE' MARKER_B64='$MARKER_B64' TARGET_WEIGHT='$TARGET_WEIGHT' php"

cat <<'PHP' | ssh "$HOST" "$REMOTE_CMD"
<?php
define('CLI_SCRIPT', true);
require '/var/www/moodle/public/config.php';

function norm_text(string $s): string {
    $s = str_replace("\r\n", "\n", $s);
    return str_replace("\r", "\n", $s);
}

$mode = getenv('MODE') ?: 'check';
$desiredtitle = rtrim(base64_decode(getenv('TITLE_B64') ?: ''), "\r\n");
$desiredtext = base64_decode(getenv('TEXT_B64') ?: '') ?: '';
$desiredformat = (string)(getenv('FORMAT_VALUE') ?: '1');
$marker = base64_decode(getenv('MARKER_B64') ?: '') ?: '';
$targetweight = (int)(getenv('TARGET_WEIGHT') ?: '1');
$pt = 'my-index';
$sp = '2';
$now = time();

$instances = $DB->get_records('block_instances', [
    'pagetypepattern' => $pt,
    'subpagepattern' => $sp,
    'blockname' => 'html',
], 'id ASC');

$matches = [];
foreach ($instances as $instance) {
    $cfg = @unserialize(base64_decode($instance->configdata));
    if (!is_object($cfg)) {
        continue;
    }
    $text = (string)($cfg->text ?? '');
    if (
        strpos($text, $marker) !== false ||
        strpos($text, '<!-- NovaLXP Dashboard: Single featured course -->') !== false ||
        strpos($text, '<!-- NovaLXP Dashboard: Featured hackathon primer -->') !== false
    ) {
        $matches[] = [$instance, $cfg];
    }
}

$match = null;
foreach ($matches as $candidate) {
    [$candidateinstance, $candidatecfg] = $candidate;
    $candidatetext = (string)($candidatecfg->text ?? '');
    if (strpos($candidatetext, $marker) !== false) {
        $match = [$candidateinstance, $candidatecfg];
    }
}
if (!$match && $matches) {
    $match = end($matches);
}

$hasduplicates = count($matches) > 1;

if (!$match) {
    if ($mode !== 'apply') {
        echo "MISSING\tmarker=featured-courses\n";
        exit(2);
    }

    $template = reset($instances);
    if (!$template) {
        throw new moodle_exception('No dashboard HTML block found to clone metadata from.');
    }

    $cfg = (object)[
        'title' => $desiredtitle,
        'format' => $desiredformat,
        'text' => $desiredtext,
    ];

    $new = clone $template;
    unset($new->id);
    $new->defaultregion = 'content';
    $new->defaultweight = $targetweight;
    $new->configdata = base64_encode(serialize($cfg));
    if (property_exists($new, 'timecreated')) {
        $new->timecreated = $now;
    }
    if (property_exists($new, 'timemodified')) {
        $new->timemodified = $now;
    }
    $instanceid = $DB->insert_record('block_instances', $new);

    $position = (object)[
        'blockinstanceid' => $instanceid,
        'contextid' => 1,
        'pagetype' => $pt,
        'subpage' => $sp,
        'visible' => 1,
        'region' => 'content',
        'weight' => $targetweight,
        'timecreated' => $now,
        'timemodified' => $now,
    ];
    $DB->insert_record('block_positions', $position);

    echo "CREATED\tid={$instanceid}\tweight={$targetweight}\n";
    exit(0);
}

[$instance, $cfg] = $match;
$title = (string)($cfg->title ?? '');
$format = (string)($cfg->format ?? '');
$text = (string)($cfg->text ?? '');
$position = $DB->get_record('block_positions', ['blockinstanceid' => $instance->id, 'pagetype' => $pt, 'subpage' => $sp]);
$weight = $position ? (int)$position->weight : (int)$instance->defaultweight;
$drift = ($title !== $desiredtitle) || ($format !== $desiredformat) || (norm_text($text) !== norm_text($desiredtext)) || ($weight !== $targetweight) || $hasduplicates;

if (!$drift) {
    echo "OK\tid={$instance->id}\tweight={$weight}\n";
    exit(0);
}

echo "DRIFT\tid={$instance->id}\ttitle=" . (($title === $desiredtitle) ? 'ok' : 'diff') .
    "\tformat=" . (($format === $desiredformat) ? 'ok' : 'diff') .
    "\ttext=" . ((norm_text($text) === norm_text($desiredtext)) ? 'ok' : 'diff') .
    "\tweight=" . (($weight === $targetweight) ? 'ok' : 'diff') .
    "\tduplicates=" . ($hasduplicates ? 'diff' : 'ok') . "\n";

if ($mode !== 'apply') {
    exit(2);
}

$cfg->title = $desiredtitle;
$cfg->format = $desiredformat;
$cfg->text = $desiredtext;
$instance->configdata = base64_encode(serialize($cfg));
if (property_exists($instance, 'timemodified')) {
    $instance->timemodified = $now;
}
$DB->update_record('block_instances', $instance);

if (count($matches) > 1) {
    foreach ($matches as $extramatch) {
        [$extrainstance] = $extramatch;
        if ((int)$extrainstance->id === (int)$instance->id) {
            continue;
        }
        $extraposition = $DB->get_record('block_positions', ['blockinstanceid' => $extrainstance->id, 'pagetype' => $pt, 'subpage' => $sp]);
        if ($extraposition) {
            $extraposition->visible = 0;
            if (property_exists($extraposition, 'timemodified')) {
                $extraposition->timemodified = $now;
            }
            $DB->update_record('block_positions', $extraposition);
        }
    }
}

if (!$position) {
    $position = (object)[
        'blockinstanceid' => $instance->id,
        'contextid' => 1,
        'pagetype' => $pt,
        'subpage' => $sp,
        'visible' => 1,
        'region' => 'content',
        'weight' => $targetweight,
        'timecreated' => $now,
        'timemodified' => $now,
    ];
    $DB->insert_record('block_positions', $position);
} else {
    $position->visible = 1;
    $position->region = 'content';
    $position->weight = $targetweight;
    if (property_exists($position, 'timemodified')) {
        $position->timemodified = $now;
    }
    $DB->update_record('block_positions', $position);
}

echo "UPDATED\tid={$instance->id}\tweight={$targetweight}\n";
PHP
