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
 * Semester customfield field controller
 *
 * @package   customfield_semester
 * @copyright 2020 Justus Dieckmann WWU
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace customfield_semester;

defined('MOODLE_INTERNAL') || die;

/**
 * Semester customfield field controller
 *
 * @package   customfield_semester
 * @copyright 2020 Justus Dieckmann WWU
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class field_controller extends \core_customfield\field_controller {
    /**
     * Plugin type
     */
    const TYPE = 'semester';

    /**
     * Add fields for editing a select field.
     *
     * @param \MoodleQuickForm $mform
     */
    public function config_form_definition(\MoodleQuickForm $mform) {
        $config = $this->get('configdata');

        $mform->addElement('header', 'header_specificsettings',
                get_string('specificsettings', 'customfield_semester'));
        $mform->setExpanded('header_specificsettings', true);

        $mform->addElement('text', 'configdata[showmonthsintofuture]',
                get_string('showmonthsintofuture', 'customfield_semester'));
        $mform->setType('configdata[showmonthsintofuture]', PARAM_INT);
        if (!$config) {
            $mform->setDefault('configdata[showmonthsintofuture]', 6);
        }
        $mform->addRule('configdata[showmonthsintofuture]', null, 'numeric', null, 'client');

        $mform->addElement('text', 'configdata[defaultmonthsintofuture]',
                get_string('defaultmonthsintofuture', 'customfield_semester'));
        $mform->setType('configdata[defaultmonthsintofuture]', PARAM_INT);
        if (!$config) {
            $mform->setDefault('configdata[defaultmonthsintofuture]', 3);
        }
        $mform->addRule('configdata[defaultmonthsintofuture]', null, 'numeric', null, 'client');

        $mform->addElement('text', 'configdata[beginofsemesters]',
                get_string('beginofsemesters', 'customfield_semester'));
        $mform->setType('configdata[beginofsemesters]', PARAM_INT);
        if (!$config) {
            $mform->setDefault('configdata[beginofsemesters]', 2007);
        }
        $mform->addRule('configdata[beginofsemesters]', null, 'numeric', null, 'client');
    }

    /**
     * Does this custom field type support being used as part of the block_myoverview
     * custom field grouping?
     * @return bool
     */
    public function supports_course_grouping(): bool {
        return true;
    }

    /**
     * If this field supports course grouping, then this function needs overriding to
     * return the formatted values for this.
     * @param array $values the used values that need formatting
     * @return array
     */
    public function course_grouping_format_values($values): array {
        global $CFG;

        // Require local library.
        require_once($CFG->dirroot.'/customfield/field/semester/locallib.php');

        // Get config from DB.
        $config = get_config('customfield_semester');

        // Prepare return array.
        $ret = [];

        // The values arrive in CUSTOMFIELD_SEMESTER_PRESENTATION_ASC order here.
        // If the admin wants to present them in CUSTOMFIELD_SEMESTER_PRESENTATION_DESC order, we need to reverse the array now.
        if ($config->termpresentationorder == CUSTOMFIELD_SEMESTER_PRESENTATION_DESC) {
            $values = array_reverse($values, true);
        }

        // Iterate over given values.
        foreach ($values as $value) {
            $name = data_controller::get_name_for_semester($value);
            if ($name) {
                $ret[$value] = $name;
            }
        }

        // Return values.
        return $ret;
    }
}
