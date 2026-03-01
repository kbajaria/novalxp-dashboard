<?php
defined('MOODLE_INTERNAL') || die();

$capabilities = [
    'local/novalxpapi:use' => [
        'riskbitmask' => RISK_XSS,
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => [
            'manager' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW
        ],
    ],
];

