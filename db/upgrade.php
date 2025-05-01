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
 * Execute customfield_semester upgrade from the given old version
 * @package   customfield_semester
 * @copyright Thomas Niedermaier, University Münster
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Execute customfield_semester upgrade from the given old version
 *
 * @param int $oldversion
 * @return bool
 * @throws dml_exception
 * @throws downgrade_exception
 * @throws moodle_exception
 * @throws upgrade_exception
 */
function xmldb_customfield_semester_upgrade($oldversion) {
    if ($oldversion < 2025043000) {

        // Make sure that the new admin setting field visibleincoursesettings is initialized with the value 1.
        $config = get_config('customfield_semester');

        if (!isset($config->visibleincoursesettings)) {
            set_config('visibleincoursesettings', 1, 'customfield_semester');
        }

        // Opencast savepoint reached.
        upgrade_plugin_savepoint(true, 2025043000, 'opencast');
    }

    return true;
}
