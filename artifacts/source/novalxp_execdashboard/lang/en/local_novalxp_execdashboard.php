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

$string['pluginname'] = 'NovaLXP executive dashboard';
$string['novalxp_execdashboard:view'] = 'View the NovaLXP executive dashboard';
$string['privacy:metadata'] = 'The NovaLXP executive dashboard plugin does not store personal data.';
$string['title'] = 'NovaLXP executive dashboard';
$string['heading'] = 'Executive KPI summary';
$string['intro'] = 'Initial scaffold for Moodle-native leadership reporting using NovaLXP enrolment and completion data.';
$string['tile_activelearners'] = 'Active learners';
$string['tile_activeenrolments'] = 'Active enrolments';
$string['tile_completions'] = 'Completed enrolments';
$string['tile_completionrate'] = 'Completion rate';
$string['tile_newenrolments30'] = 'New enrolments (30 days)';
$string['tile_completions30'] = 'Completions (30 days)';
$string['section_notes'] = 'Implementation notes';
$string['note_capability'] = 'Access is controlled by the `local/novalxp_execdashboard:view` capability.';
$string['note_scope'] = 'This scaffold currently uses site-wide enrolment and completion data. Cohort or client scoping should be added before exposing it to delegated client admins.';
$string['note_inprogress'] = 'Current executive summary treats in-progress implicitly as active enrolments minus completions. A later iteration should distinguish not-started from genuinely in-progress learners.';
$string['note_next'] = 'Next step: add cohort, client, category, and date filters plus trend series backed by pre-aggregated reporting tables if needed.';
