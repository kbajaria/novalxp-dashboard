<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {
    $settings = new admin_settingpage('local_novalxp_execdashboard_settings', get_string('pluginname', 'local_novalxp_execdashboard'));

    $settings->add(new admin_setting_heading(
        'local_novalxp_execdashboard/settingsheading_aws',
        get_string('settingsheading_aws', 'local_novalxp_execdashboard'),
        get_string('settingsheading_aws_desc', 'local_novalxp_execdashboard')
    ));

    $settings->add(new admin_setting_configcheckbox(
        'local_novalxp_execdashboard/awsbillingenabled',
        get_string('setting_awsbillingenabled', 'local_novalxp_execdashboard'),
        get_string('setting_awsbillingenabled_desc', 'local_novalxp_execdashboard'),
        0
    ));

    $settings->add(new admin_setting_configcheckbox(
        'local_novalxp_execdashboard/awsuseec2role',
        get_string('setting_awsuseec2role', 'local_novalxp_execdashboard'),
        get_string('setting_awsuseec2role_desc', 'local_novalxp_execdashboard'),
        1
    ));

    $settings->add(new admin_setting_configtext(
        'local_novalxp_execdashboard/awsaccesskeyid',
        get_string('setting_awsaccesskeyid', 'local_novalxp_execdashboard'),
        get_string('setting_awsaccesskeyid_desc', 'local_novalxp_execdashboard'),
        '',
        PARAM_ALPHANUMEXT
    ));

    $settings->add(new admin_setting_configpasswordunmask(
        'local_novalxp_execdashboard/awssecretaccesskey',
        get_string('setting_awssecretaccesskey', 'local_novalxp_execdashboard'),
        get_string('setting_awssecretaccesskey_desc', 'local_novalxp_execdashboard'),
        ''
    ));

    $settings->add(new admin_setting_configpasswordunmask(
        'local_novalxp_execdashboard/awssessiontoken',
        get_string('setting_awssessiontoken', 'local_novalxp_execdashboard'),
        get_string('setting_awssessiontoken_desc', 'local_novalxp_execdashboard'),
        ''
    ));

    $settings->add(new admin_setting_configtext(
        'local_novalxp_execdashboard/awslinkedaccount',
        get_string('setting_awslinkedaccount', 'local_novalxp_execdashboard'),
        get_string('setting_awslinkedaccount_desc', 'local_novalxp_execdashboard'),
        '',
        PARAM_TEXT
    ));

    $settings->add(new admin_setting_configtext(
        'local_novalxp_execdashboard/awsaicostservices',
        get_string('setting_awsaicostservices', 'local_novalxp_execdashboard'),
        get_string('setting_awsaicostservices_desc', 'local_novalxp_execdashboard'),
        'Amazon Bedrock',
        PARAM_TEXT
    ));

    $settings->add(new admin_setting_configtext(
        'local_novalxp_execdashboard/awstimeout',
        get_string('setting_awstimeout', 'local_novalxp_execdashboard'),
        get_string('setting_awstimeout_desc', 'local_novalxp_execdashboard'),
        20,
        PARAM_INT
    ));

    $settings->add(new admin_setting_heading(
        'local_novalxp_execdashboard/settingsheading_costs',
        get_string('settingsheading_costs', 'local_novalxp_execdashboard'),
        get_string('settingsheading_costs_desc', 'local_novalxp_execdashboard')
    ));

    $settings->add(new admin_setting_configtext(
        'local_novalxp_execdashboard/monthlyplatformcost',
        get_string('setting_monthlyplatformcost', 'local_novalxp_execdashboard'),
        get_string('setting_monthlyplatformcost_desc', 'local_novalxp_execdashboard'),
        '0',
        PARAM_FLOAT
    ));

    $settings->add(new admin_setting_configtext(
        'local_novalxp_execdashboard/monthlyaicost',
        get_string('setting_monthlyaicost', 'local_novalxp_execdashboard'),
        get_string('setting_monthlyaicost_desc', 'local_novalxp_execdashboard'),
        '0',
        PARAM_FLOAT
    ));

    $ADMIN->add('reports', $settings);

    $ADMIN->add('reports', new admin_externalpage(
        'local_novalxp_execdashboard',
        get_string('pluginname', 'local_novalxp_execdashboard'),
        new moodle_url('/local/novalxp_execdashboard/index.php'),
        'local/novalxp_execdashboard:view'
    ));
}
