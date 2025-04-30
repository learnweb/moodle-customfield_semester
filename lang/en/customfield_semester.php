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
 * @copyright 2025 Thomas Niedermaier University Münster
 * @copyright 2020 Justus Dieckmann WWU
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['beginofsemesters'] = 'The year, the list of semesters begins in.';
$string['defaultmonthsintofuture'] = 'The default option is the semester in X months.';
$string['internaltermrepresentation'] = 'Internal term representation';
$string['internaltermrepresentation_desc'] = 'With this setting, you control how the custom field represents the terms internally (in the Moodle database). This is relevant if you want to integrate Moodle with external lecture management systems and want to fill the custom field directly with values from an external system.';
$string['internaltermrepresentationst0wt1'] = 'Represent the summer term as term 0 and the winter term as term 1';
$string['internaltermrepresentationst1wt2'] = 'Represent the summer term as term 1 and the winter term as term 2';
$string['internaltermrepresentationwarning'] = '<strong>Warning:</strong> Changing this setting will <em>not</em> update existing field values in existing courses. Please change this setting only if you really need to and if you are aware that you will have to fill the fields of existing courses again.';
$string['pluginname'] = 'Semester field';
$string['semesterindependent'] = 'Term-independent';
$string['showmonthsintofuture'] = 'A semester will be selectable, if it begins in less than X months.';
$string['specificsettings'] = 'Semester field settings';
$string['startmonthnote'] = 'Please note: Acceptable values are numbers between 1 and 12. This setting assumes that the summer term comes before the winter term. If you configure the terms the other way round, the custom field will silently ignore your settings and use the defaults.';
$string['summersemester'] = 'ST {$a}';
$string['summertermstartmonth'] = 'The month when summer term starts';
$string['summertermstartmonth_desc'] = 'With this setting, you define in which month the summer term starts.';
$string['termpresentationasc'] = 'Older terms first, term-independent entry at the beginning of the list';
$string['termpresentationdesc'] = 'Newer terms first, term-independent entry at the end of the list';
$string['termpresentationorder'] = 'Term presentation order';
$string['termpresentationorder_desc'] = 'With this setting, you control how the list of terms is presented within the course settings and (if the field is used as a course filter) within the Dashboard course overview block.';
$string['wintersemester'] = 'WT {$a}';
$string['wintertermstartmonth'] = 'The month when winter term starts';
$string['wintertermstartmonth_desc'] = 'With this setting, you define in which month the winter term starts.';
