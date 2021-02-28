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

/**
 * Customfield semester field plugin strings
 *
 * @package   customfield_semester
 * @copyright 2020 Justus Dieckmann WWU
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Semester field';
$string['semesterindependent'] = 'Term-independent';
$string['summersemester'] = 'ST {$a}';
$string['wintersemester'] = 'WT {$a}';
$string['specificsettings'] = 'Semester field settings';
$string['showmonthsintofuture'] = 'A semester will be selectable, if it begins in less than X months.';
$string['defaultmonthsintofuture'] = 'The default option is the semester in X months.';
$string['beginofsemesters'] = 'The year, the list of semesters begins in.';
$string['summertermstartmonth'] = 'The month when summer term starts';
$string['summertermstartmonth_desc'] = 'With this setting, you define in which month the summer term starts.';
$string['wintertermstartmonth'] = 'The month when winter term starts';
$string['wintertermstartmonth_desc'] = 'With this setting, you define in which month the winter term starts.';
$string['startmonthnote'] = 'Please note: Acceptable values are numbers between 1 and 12. This setting assumes that the summer term comes before the winter term. If you configure the terms the other way round, the custom field will silently ignore your settings and use the defaults.';
