<?php
// This file is part of Moodle - http://moodle.org/
//
// Local plugin: local_novalxpapi
//
// Event observers.

defined('MOODLE_INTERNAL') || die();

$observers = [
    [
        'eventname'   => '\core\event\course_created',
        'callback'    => '\local_novalxpapi\observer::course_created',
        'includefile' => '/local/novalxpapi/classes/observer.php',
        'internal'    => false,
        'priority'    => 9999,
    ],
];

