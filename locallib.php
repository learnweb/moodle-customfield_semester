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
 * Customfield Semester Type - Local library.
 *
 * @package   customfield_semester
 * @copyright 2021 Alexander Bias
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Constants for term default start months.
define('CUSTOMFIELD_SEMESTER_SUMMERTERMSTART', 4);
define('CUSTOMFIELD_SEMESTER_WINTERTERMSTART', 10);

// Constants for term presentation order.
define('CUSTOMFIELD_SEMESTER_PRESENTATION_ASC', 'asc');
define('CUSTOMFIELD_SEMESTER_PRESENTATION_DESC', 'desc');

// Constants for internal term representation.
define('CUSTOMFIELD_SEMESTER_INTERNAL_ST0WT1', 'st0wt1');
define('CUSTOMFIELD_SEMESTER_INTERNAL_ST0WT1_ST', 0);
define('CUSTOMFIELD_SEMESTER_INTERNAL_ST0WT1_WT', 1);
define('CUSTOMFIELD_SEMESTER_INTERNAL_ST1WT2', 'st1wt2');
define('CUSTOMFIELD_SEMESTER_INTERNAL_ST1WT2_ST', 1);
define('CUSTOMFIELD_SEMESTER_INTERNAL_ST1WT2_WT', 2);
define('CUSTOMFIELD_SEMESTER_INTERNAL_TERMINDEPENDENT', 1);
