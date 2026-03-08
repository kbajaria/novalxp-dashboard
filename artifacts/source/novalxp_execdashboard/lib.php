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

/**
 * Add a navigation link for users who can view the executive dashboard.
 *
 * @param global_navigation $navigation
 * @return void
 */
function local_novalxp_execdashboard_extend_navigation(global_navigation $navigation): void {
    if (!isloggedin() || isguestuser()) {
        return;
    }

    $context = context_system::instance();
    if (!has_capability('local/novalxp_execdashboard:view', $context)) {
        return;
    }

    $url = new moodle_url('/local/novalxp_execdashboard/index.php');
    $navigation->add(
        get_string('pluginname', 'local_novalxp_execdashboard'),
        $url,
        navigation_node::TYPE_CUSTOM,
        null,
        'local_novalxp_execdashboard'
    );
}
