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
SPEC_DIR="$ROOT_DIR/spec/dashboard-search"
TITLE_FILE="$SPEC_DIR/title.txt"
TEXT_FILE="$SPEC_DIR/text.html"
FORMAT_FILE="$SPEC_DIR/format.txt"
MARKER="<!-- NovaLXP Dashboard: Search block -->"
TARGET_WEIGHT=-2

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
$targetweight = (int)(getenv('TARGET_WEIGHT') ?: '-2');
$pt = 'my-index';
$sp = '2';
$now = time();

$htmlinstances = $DB->get_records('block_instances', [
    'pagetypepattern' => $pt,
    'subpagepattern' => $sp,
    'blockname' => 'html',
], 'id ASC');

$allinstances = $DB->get_records('block_instances', [
    'pagetypepattern' => $pt,
    'subpagepattern' => $sp,
], 'id ASC');

$match = null;
foreach ($htmlinstances as $instance) {
    $cfg = @unserialize(base64_decode($instance->configdata));
    if (!is_object($cfg)) {
        continue;
    }
    $text = (string)($cfg->text ?? '');
    if (strpos($text, $marker) !== false) {
        $match = [$instance, $cfg];
        break;
    }
}

if (!$match) {
    if ($mode !== 'apply') {
        echo "MISSING\tmarker=search-block\n";
        exit(2);
    }

    $template = reset($htmlinstances);
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

    foreach ($allinstances as $instance) {
        $bp = $DB->get_record('block_positions', ['blockinstanceid' => $instance->id, 'pagetype' => $pt, 'subpage' => $sp]);
        $region = $bp ? $bp->region : $instance->defaultregion;
        $weight = $bp ? (int)$bp->weight : (int)$instance->defaultweight;
        if ($region === 'content' && $weight >= $targetweight) {
            if ($bp) {
                $bp->weight = $weight + 1;
                $DB->update_record('block_positions', $bp);
            } else {
                $instance->defaultweight = $weight + 1;
                if (property_exists($instance, 'timemodified')) {
                    $instance->timemodified = $now;
                }
                $DB->update_record('block_instances', $instance);
            }
        }
    }

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
$hascollision = false;
foreach ($allinstances as $otherinstance) {
    if ((int)$otherinstance->id === (int)$instance->id) {
        continue;
    }
    $otherposition = $DB->get_record('block_positions', ['blockinstanceid' => $otherinstance->id, 'pagetype' => $pt, 'subpage' => $sp]);
    $otherregion = $otherposition ? $otherposition->region : $otherinstance->defaultregion;
    $otherweight = $otherposition ? (int)$otherposition->weight : (int)$otherinstance->defaultweight;
    if ($otherregion === 'content' && $otherweight === $targetweight) {
        $hascollision = true;
        break;
    }
}
$drift = ($title !== $desiredtitle) || ($format !== $desiredformat) || (norm_text($text) !== norm_text($desiredtext)) || ($weight !== $targetweight) || $hascollision;

if (!$drift) {
    echo "OK\tid={$instance->id}\tweight={$weight}\n";
    exit(0);
}

echo "DRIFT\tid={$instance->id}\ttitle=" . (($title === $desiredtitle) ? 'ok' : 'diff') .
    "\tformat=" . (($format === $desiredformat) ? 'ok' : 'diff') .
    "\ttext=" . ((norm_text($text) === norm_text($desiredtext)) ? 'ok' : 'diff') .
    "\tweight=" . (($weight === $targetweight) ? 'ok' : 'diff') .
    "\tcollision=" . ($hascollision ? 'diff' : 'ok') . "\n";

if ($mode !== 'apply') {
    exit(2);
}

foreach ($allinstances as $otherinstance) {
    if ((int)$otherinstance->id === (int)$instance->id) {
        continue;
    }
    $bp = $DB->get_record('block_positions', ['blockinstanceid' => $otherinstance->id, 'pagetype' => $pt, 'subpage' => $sp]);
    $region = $bp ? $bp->region : $otherinstance->defaultregion;
    $otherweight = $bp ? (int)$bp->weight : (int)$otherinstance->defaultweight;
    $shouldshift = false;
    if ($region === 'content') {
        if ($otherweight >= $targetweight && $otherweight < $weight) {
            $shouldshift = true;
        } else if ($weight === $targetweight && $otherweight === $targetweight) {
            $shouldshift = true;
        }
    }
    if ($shouldshift) {
        if ($bp) {
            $bp->weight = $otherweight + 1;
            $DB->update_record('block_positions', $bp);
        } else {
            $otherinstance->defaultweight = $otherweight + 1;
            if (property_exists($otherinstance, 'timemodified')) {
                $otherinstance->timemodified = $now;
            }
            $DB->update_record('block_instances', $otherinstance);
        }
    }
}

$cfg->title = $desiredtitle;
$cfg->format = $desiredformat;
$cfg->text = $desiredtext;
$instance->configdata = base64_encode(serialize($cfg));
if (property_exists($instance, 'timemodified')) {
    $instance->timemodified = $now;
}
$DB->update_record('block_instances', $instance);

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
