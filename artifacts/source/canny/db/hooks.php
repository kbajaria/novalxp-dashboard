<?php
defined('MOODLE_INTERNAL') || die();

// Register our hook callback for the footer HTML generation hook.
$callbacks = [
    [
        'hook'     => \core\hook\output\before_footer_html_generation::class,
        'callback' => \local_canny\hook_callbacks::class . '::before_footer_html_generation',
        'priority' => 0,
    ],
];

