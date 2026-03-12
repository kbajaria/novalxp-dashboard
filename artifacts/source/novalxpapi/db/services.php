<?php
// local/novalxpapi/db/services.php

defined('MOODLE_INTERNAL') || die();

$functions = array(

    'local_novalxpapi_create_course' => array(
        'classname'    => 'local_novalxpapi\external',
        'methodname'   => 'create_course',
        'description'  => 'Create a new course in a given category.',
        'type'         => 'write',
        'capabilities' => 'moodle/course:create',
        'ajax'         => false,
    ),

    'local_novalxpapi_enrol_user' => array(
        'classname'    => 'local_novalxpapi\external',
        'methodname'   => 'enrol_user',
        'description'  => 'Enrol a user into a course with a given role.',
        'type'         => 'write',
        'capabilities' => 'enrol/manual:enrol',
        'ajax'         => false,
    ),

    'local_novalxpapi_add_section' => array(
        'classname'    => 'local_novalxpapi\external',
        'methodname'   => 'add_section',
        'description'  => 'Add a new section/topic to a course.',
        'type'         => 'write',
        'capabilities' => 'moodle/course:update',
        'ajax'         => false,
    ),

    'local_novalxpapi_add_page' => array(
        'classname'    => 'local_novalxpapi\external',
        'methodname'   => 'add_page',
        'description'  => 'Create a new Page activity in a course section.',
        'type'         => 'write',
        'capabilities' => 'moodle/course:manageactivities,mod/page:addinstance',
        'ajax'         => false,
    ),

    'local_novalxpapi_create_quiz' => array(
        'classname'    => 'local_novalxpapi\external',
        'methodname'   => 'create_quiz',
        'description'  => 'Create a quiz in a course section and (optionally) populate it from GIFT text.',
        'type'         => 'write',
        'capabilities' => 'moodle/course:manageactivities,mod/quiz:addinstance',
        'ajax'         => false,
    ),

    'local_novalxpapi_apply_quiz_completion_guardrails' => array(
        'classname'    => 'local_novalxpapi\external',
        'methodname'   => 'apply_quiz_completion_guardrails',
        'description'  => 'Apply quiz-pass-based course completion guardrails for NovaLXP AI-generated courses.',
        'type'         => 'write',
        'capabilities' => 'moodle/course:update,moodle/course:manageactivities',
        'ajax'         => false,
    ),
);

$services = array(
    'NovaLXP API' => array(
        'shortname'       => 'novalxpapi',
        'functions'       => array(
            'local_novalxpapi_create_course',
            'local_novalxpapi_enrol_user',
            'local_novalxpapi_add_section',
            'local_novalxpapi_add_page',
            'local_novalxpapi_create_quiz',
            'local_novalxpapi_apply_quiz_completion_guardrails',
        ),
        'enabled'         => 1,
        'restrictedusers' => 0,
        'downloadfiles'   => 0,
        'uploadfiles'     => 0,
    ),
);
