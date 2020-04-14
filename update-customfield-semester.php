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
 * Update semester custom field type.
 *
 * This script is used by the WWU Münster to update the already existing custom field from a select type to a
 * customfield_semester type, and update the values for that field.
 *
 * Term independent courses get the value 1.
 * All other courses get a value in the form of YYYYS, where YYYY is the year, in which the term begins, and S is either 0 for
 * summer term or 1 for winterterm.
 *
 * @package    customfield_semester
 * @copyright  2020 Justus Dieckmann WWU
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

define('CLI_SCRIPT', 1);

require_once(__DIR__ . '/../../../config.php');

global $DB;

$category = $DB->get_record('customfield_category', array('name' => 'Semester', 'component' => 'core_course', 'area' => 'course'));
if (!$category) {
    die('Customfield category does not exist!');
}

$field = $DB->get_record('customfield_field', array('name' => 'Semester', 'type' => 'select', 'categoryid' => $category->id));
if (!$field) {
    die('Customfield does not exist!');
}

// Update custom field to semester type
$field->type = 'semester';
$field->configdata = '{"required":"1","uniquevalues":"0","showmonthsintofuture":6,"defaultmonthsintofuture":3,"beginofsemesters":2007,"locked":"0","visibility":"2"}';
$field->timemodified = time();
$success = $DB->update_record('customfield_field', $field);
if (!$success) {
    die("customfield failure:" . $success);
}

// Update custom field data for every course.
$courseids = $DB->get_fieldset_select('course', 'id', 'TRUE', array());
foreach ($courseids as $courseid) {
    $record = $DB->get_record('customfield_data', array(
            'fieldid' => $field->id,
            'instanceid' => $courseid
    ));

    if (!$record) {
        echo "Error: course ($courseid) has no semester custom field<br>";
        continue;
    }

    $value = (int) $record->intvalue;
    if ($value >= 32) {
        // Old semester id 32 stands for SS2022, is probably an error.
        // The value will be converted anyway, but a warning will be printed.
        echo "Warning: Value $value for course ($courseid) is far into future!<br>";
    }

    if ($value <= 1) {
        // Semesterindependent
        $record->intvalue = 1;
    } else {
        // Calculate new semesterid from old semesterid
        // 2 => 20070
        // 3 => 20071
        // 4 => 20080
        // etc.
        $record->intvalue = ((int)($value / 2) + 2006) * 10 + $value % 2;
    }
    $record->value = $record->intvalue;
    if (!$DB->update_record('customfield_data', $record)) {
        echo "Error: Updating course ($courseid) failed!<br>";
    }
}

echo "Finished!";