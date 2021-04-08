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

$string['pluginname'] = 'Semesterfeld';
$string['semesterindependent'] = 'Semesterunabhängig';
$string['summersemester'] = 'SoSe {$a}';
$string['wintersemester'] = 'WiSe {$a}';
$string['specificsettings'] = 'Einstellungen für das Semesterfeld';
$string['showmonthsintofuture'] = 'Ein Semester ist auswählbar, wenn es in weniger als X Monaten beginnt.';
$string['defaultmonthsintofuture'] = 'Standard ist das Semester in X Monaten.';
$string['beginofsemesters'] = 'Das Jahr, in dem die Liste der Semester anfängt.';
$string['summertermstartmonth'] = 'Der Monat in dem das Sommersemester startet';
$string['summertermstartmonth_desc'] = 'Mit dieser Einstellung definieren Sie in welchem Monat das Sommersemester startet.';
$string['termpresentationasc'] = 'Ältere Semester zuerst, semesterunabhängiger Eintrag am Beginn der Liste';
$string['termpresentationdesc'] = 'Neuere Semester zuerst, semesterunabhängiger Eintrag am Ende der Liste';
$string['termpresentationorder'] = 'Darstellungsreihenfolge der Semester';
$string['termpresentationorder_desc'] = 'Mit dieser Einstellung definieren Sie wie die Liste der Semester innerhalb der Kurseinstellungen und (falls das Feld als Kursfilter verwendet wird) innerhalb des Kursübersichtsblocks auf dem Dashboard dargestellt wird.';
$string['wintertermstartmonth'] = 'Der Monat in dem das Wintersemester startet';
$string['wintertermstartmonth_desc'] = 'Mit dieser Einstellung definieren Sie in welchem Monat das Wintersemester startet.';
$string['startmonthnote'] = 'Bitte beachten: Gültige Einstellungen sind Werte zwischen 1 und 12. Diese Einstellung geht davon aus, dass das Sommersemester im Jahresverlauf vor dem Wintersemester kommt. Falls Sie die Semester andersrum konfigurieren, wird das Kursfeld Ihre Einstellung stillschweigend ignorieren und die Standardwerte nutzen.';
