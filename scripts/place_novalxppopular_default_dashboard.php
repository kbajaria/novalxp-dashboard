<?php
define('CLI_SCRIPT', true);
require('/var/www/moodle/public/config.php');

$pt = 'my-index';
$sp = '2';
$targetregion = 'content';
$targetweight = 0;
$now = time();

$tx = $DB->start_delegated_transaction();

$instance = $DB->get_record('block_instances', [
    'blockname' => 'novalxppopular',
    'pagetypepattern' => $pt,
    'subpagepattern' => $sp,
]);

if (!$instance) {
    $template = $DB->get_record_select(
        'block_instances',
        'pagetypepattern = :pt AND subpagepattern = :sp',
        ['pt' => $pt, 'sp' => $sp],
        '*',
        IGNORE_MULTIPLE
    );
    if (!$template) {
        throw new moodle_exception('No default dashboard block instance found to clone metadata from.');
    }

    $new = clone $template;
    unset($new->id);
    $new->blockname = 'novalxppopular';
    $new->defaultregion = $targetregion;
    $new->defaultweight = $targetweight;
    $new->configdata = '';
    if (property_exists($new, 'timecreated')) {
        $new->timecreated = $now;
    }
    if (property_exists($new, 'timemodified')) {
        $new->timemodified = $now;
    }
    $instanceid = $DB->insert_record('block_instances', $new);
    $instance = $DB->get_record('block_instances', ['id' => $instanceid], '*', MUST_EXIST);
    echo "Created block instance ID: {$instanceid}" . PHP_EOL;
} else {
    $instanceid = (int)$instance->id;
    echo "Using existing block instance ID: {$instanceid}" . PHP_EOL;
}

$all = $DB->get_records('block_instances', ['pagetypepattern' => $pt, 'subpagepattern' => $sp]);
foreach ($all as $bi) {
    if ((int)$bi->id === $instanceid) {
        continue;
    }
    $bp = $DB->get_record('block_positions', ['blockinstanceid' => $bi->id, 'pagetype' => $pt, 'subpage' => $sp]);
    $region = $bp ? $bp->region : $bi->defaultregion;
    $weight = $bp ? (int)$bp->weight : (int)$bi->defaultweight;

    if ($region === $targetregion && $weight >= $targetweight) {
        if ($bp) {
            $bp->weight = $weight + 1;
            $DB->update_record('block_positions', $bp);
        } else {
            $bi->defaultweight = $weight + 1;
            if (property_exists($bi, 'timemodified')) {
                $bi->timemodified = $now;
            }
            $DB->update_record('block_instances', $bi);
        }
    }
}

$position = $DB->get_record('block_positions', [
    'blockinstanceid' => $instanceid,
    'pagetype' => $pt,
    'subpage' => $sp,
]);

if (!$position) {
    $position = (object)[
        'blockinstanceid' => $instanceid,
        'contextid' => 1,
        'pagetype' => $pt,
        'subpage' => $sp,
        'visible' => 1,
        'region' => $targetregion,
        'weight' => $targetweight,
        'timecreated' => $now,
        'timemodified' => $now,
    ];
    $DB->insert_record('block_positions', $position);
} else {
    $position->region = $targetregion;
    $position->weight = $targetweight;
    if (property_exists($position, 'visible')) {
        $position->visible = 1;
    }
    if (property_exists($position, 'timemodified')) {
        $position->timemodified = $now;
    }
    $DB->update_record('block_positions', $position);
}

$instance->defaultregion = $targetregion;
$instance->defaultweight = $targetweight;
if (property_exists($instance, 'timemodified')) {
    $instance->timemodified = $now;
}
$DB->update_record('block_instances', $instance);

$tx->allow_commit();

echo "Final order for dashboard subpage 2:" . PHP_EOL;
$instances = $DB->get_records('block_instances', ['pagetypepattern' => $pt, 'subpagepattern' => $sp]);
$rows = [];
foreach ($instances as $bi) {
    $bp = $DB->get_record('block_positions', ['blockinstanceid' => $bi->id, 'pagetype' => $pt, 'subpage' => $sp]);
    $region = $bp ? $bp->region : $bi->defaultregion;
    $weight = $bp ? (int)$bp->weight : (int)$bi->defaultweight;
    $rows[] = ['id' => (int)$bi->id, 'name' => $bi->blockname, 'region' => $region, 'weight' => $weight];
}
usort($rows, static function(array $a, array $b): int {
    return [$a['weight'], $a['id']] <=> [$b['weight'], $b['id']];
});
foreach ($rows as $r) {
    echo $r['id'] . "\t" . $r['name'] . "\t" . $r['region'] . "\t" . $r['weight'] . PHP_EOL;
}
