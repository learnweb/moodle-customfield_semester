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
 * Semester customfield data controller
 *
 * Semesters are encoded as YYYYS, where YYYY is the year when the semester begins and
 * S is 0 = summersemester and 1 = wintersemester. So 20191 stands for WiSe 2019/2020.
 * Exception: 0 stands for semesterindepentent.
 *
 * @package   customfield_semester
 * @copyright 2020 Justus Dieckmann WWU
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace customfield_semester;

use DateTime;

defined('MOODLE_INTERNAL') || die;

/**
 * Semester customfield data controller
 *
 * @package   customfield_semester
 * @copyright 2020 Justus Dieckmann WWU
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class data_controller extends \core_customfield\data_controller {

    /**
     * Return the name of the field where the information is stored
     *
     * @return string
     */
    public function datafield(): string {
        return 'intvalue';
    }

    /**
     * Returns the default value as it would be stored in the database (not in human-readable format).
     *
     * @return mixed
     */
    public function get_default_value() {
        $defaultmonthsintofuture = $this->get_field()->get_configdata_property('defaultmonthsintofuture');
        return self::get_semester_for_datetime(new DateTime("+$defaultmonthsintofuture months"));
    }

    /**
     * Add fields for editing a textarea field.
     *
     * @param \MoodleQuickForm $mform
     */
    public function instance_form_definition(\MoodleQuickForm $mform) {
        $field = $this->get_field();
        $formattedoptions = array(
                0 => get_string('semesterindependent', 'customfield_semester')
        );
        $showmonthsintofuture = $this->get_field()->get_configdata_property('showmonthsintofuture');
        $endtime = new DateTime("+$showmonthsintofuture months");
        $endkey = self::get_semester_for_datetime($endtime);
        $endyear = $endkey / 10;
        $endsemester = $endkey % 10;

        $beginofsemesters = $this->get_field()->get_configdata_property('beginofsemesters');
        for ($year = $beginofsemesters; $year <= $endyear; $year++) {
            $formattedoptions[$year * 10] = get_string('summersemester', 'customfield_semester') . ' ' . $year;

            if ($year == $endyear && $endsemester == 0) {
                break;
            }

            $formattedoptions[$year * 10 + 1] =
                    get_string('wintersemester', 'customfield_semester') . ' ' . $year . '/' . ($year + 1);
        }

        $elementname = $this->get_form_element_name();
        $mform->addElement('select', $elementname, $this->get_field()->get_formatted_name(), $formattedoptions);

        if ($field->get_configdata_property('required')) {
            $mform->addRule($elementname, null, 'required', null, 'client');
        }
    }

    /**
     * Validates data for this field.
     *
     * @param array $data
     * @param array $files
     * @return array
     */
    public function instance_form_validation(array $data, array $files): array {
        $errors = parent::instance_form_validation($data, $files);
        if ($this->get_field()->get_configdata_property('required')) {
            // Standard required rule does not work on select element.
            $elementname = $this->get_form_element_name();
            if (empty($data[$elementname])) {
                $errors[$elementname] = get_string('err_required', 'form');
            }
        }
        return $errors;
    }

    /**
     * Returns value in a human-readable format
     *
     * @return mixed|null value or null if empty
     */
    public function export_value() {
        $value = $this->get_value();
        return self::get_name_for_semester($value);
    }

    /**
     * Returns the human readable Semester name for a semesterid.
     *
     * @param int $value the semesterid (YYYYS as descibed at the top of the file).
     * @return string|null The human readable semester name
     */
    public static function get_name_for_semester(int $value) {
        if ($value === 0) {
            return get_string('semesterindependent', 'customfield_semester');
        } else if ($value == null) {
            return null;
        } else {
            $year = $value / 10;
            $semester = $value % 10;
            if ($semester === 0) {
                return get_string('summersemester', 'customfield_semester') . ' ' . $year;
            } else {
                return get_string('wintersemester', 'customfield_semester') . ' ' . $year . '/' . ($year + 1);
            }
        }
    }

    public static function get_semester_for_datetime(DateTime $datetime): int {
        $year = (int) $datetime->format('Y');
        $month = (int) $datetime->format('m');
        if ($month < 4) {
            $year--;
            $semester = 1;
        } else if ($month < 10) {
            $semester = 0;
        } else {
            $semester = 1;
        }
        return $year * 10 + $semester;
    }
}
