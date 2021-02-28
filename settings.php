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
 * Customfield Semester Type - Settings file.
 *
 * @package   customfield_semester
 * @copyright 2021 Alexander Bias
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    // Require local library.
    require_once($CFG->dirroot.'/customfield/field/semester/locallib.php');

    // Prepare regex for month number. This will be used instead of the PARAM_* type within the admin settings.
    $monthregex = '/^([1-9]|1[0-2])$/';

    // Setting for the summer term start month.
    $name = 'customfield_semester/summertermstartmonth';
    $title = get_string('summertermstartmonth', 'customfield_semester', null, true);
    $description = get_string('summertermstartmonth_desc', 'customfield_semester', null, true).'<br />'.
            get_string('startmonthnote', 'customfield_semester', null, true);
    $setting = new admin_setting_configtext($name, $title, $description, CUSTOMFIELD_SEMESTER_SUMMERTERMSTART, $monthregex, 2);
    $settings->add($setting);

    // Setting for the winter term start month.
    $name = 'customfield_semester/wintertermstartmonth';
    $title = get_string('wintertermstartmonth', 'customfield_semester', null, true);
    $description = get_string('wintertermstartmonth_desc', 'customfield_semester', null, true).'<br />'.
            get_string('startmonthnote', 'customfield_semester', null, true);
    $setting = new admin_setting_configtext($name, $title, $description, CUSTOMFIELD_SEMESTER_WINTERTERMSTART, $monthregex, 2);
    $settings->add($setting);
}
