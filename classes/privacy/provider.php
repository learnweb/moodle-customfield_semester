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
 * Privacy Subsystem implementation for customfield_semester.
 *
 * @package    customfield_semester
 * @copyright  2020 Justus Dieckmann
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace customfield_semester\privacy;

use core_customfield\data_controller;
use core_customfield\privacy\customfield_provider;
use core_privacy\local\request\writer;

/**
 * Privacy Subsystem for customfield_semester implementing null_provider.
 *
 * @copyright  2020 Justus Dieckmann
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class provider implements \core_privacy\local\metadata\null_provider, customfield_provider {

    /**
     * Get the language string identifier with the component's language
     * file to explain why this plugin stores no data.
     *
     * @return  string
     */
    public static function get_reason(): string {
        return 'privacy:metadata';
    }

    /**
     * Preprocesses data object that is going to be exported
     *
     * @param data_controller $data
     * @param \stdClass $exportdata
     * @param array $subcontext
     */
    public static function export_customfield_data(data_controller $data, \stdClass $exportdata, array $subcontext) {
        $context = $data->get_context();
        $exportdata->value = $data->export_value();
        writer::with_context($context)
            ->export_data($subcontext, $exportdata);
    }

    /**
     * Allows plugins to delete everything they store related to the data (usually files)
     *
     * @param string $dataidstest
     * @param array $params
     * @param array $contextids
     * @return mixed|void
     */
    public static function before_delete_data(string $dataidstest, array $params, array $contextids) {
    }

    /**
     * Allows plugins to delete everything they store related to the field configuration (usually files)
     *
     * @param string $fieldidstest
     * @param array $params
     * @param array $contextids
     */
    public static function before_delete_fields(string $fieldidstest, array $params, array $contextids) {
    }
}
