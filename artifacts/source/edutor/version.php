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

$plugin->version   = 2025102200;
$plugin->release  = 'Moodle 5.1 Edutor v8.1';
$plugin->maturity  = MATURITY_STABLE;
$plugin->requires  = 2025092600;
$plugin->component = 'theme_edutor';
$plugin->dependencies = array(
    'theme_boost'  => 2025100600, //Parent: boost
);

