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

$string['beginofsemesters'] = 'Das Jahr, in dem die Liste der Semester anfängt.';
$string['defaultmonthsintofuture'] = 'Standard ist das Semester in X Monaten.';
$string['internaltermrepresentation'] = 'Interne Semester Repräsentierung';
$string['internaltermrepresentation_desc'] = 'Mit dieser Einstellung definitieren Sie wie das Kursfeld die Semester intern (in der Moodle Datenbank) repräsentiert. Dies ist relevant falls Sie Moodle mit externen Kursplanungssystemen integrieren und das Kursfeld direkt mit Werten eines externen Systems befüllen wollen.';
$string['internaltermrepresentationst0wt1'] = 'Repräsentiere das Sommersemester als Semester 0 und das Wintersemester als Semester 1';
$string['internaltermrepresentationst1wt2'] = 'Repräsentiere das Sommersemester als Semester 1 und das Wintersemester als Semester 2';
$string['internaltermrepresentationwarning'] = '<strong>Warnung:</strong> Eine Änderung dieser Einstellung bewirkt <em>nicht</em> dass existierende Feldwerte in existierenden Kursen aktualisiert werden. Bitte ändern Sie diese Einstellung ausschließlich wenn Sie dies wirklich benötigen und Sie sich bewusst sind dass Sie danach die Feldwerte existierender Kurse neu befüllen müssen.';
$string['pluginname'] = 'Semesterfeld';
$string['semesterindependent'] = 'Semesterunabhängig';
$string['showmonthsintofuture'] = 'Ein Semester ist auswählbar, wenn es in weniger als X Monaten beginnt.';
$string['specificsettings'] = 'Einstellungen für das Semesterfeld';
$string['startmonthnote'] = 'Bitte beachten: Gültige Einstellungen sind Werte zwischen 1 und 12. Diese Einstellung geht davon aus, dass das Sommersemester im Jahresverlauf vor dem Wintersemester kommt. Falls Sie die Semester andersrum konfigurieren, wird das Kursfeld Ihre Einstellung stillschweigend ignorieren und die Standardwerte nutzen.';
$string['summersemester'] = 'SoSe {$a}';
$string['summertermstartmonth'] = 'Der Monat in dem das Sommersemester startet';
$string['summertermstartmonth_desc'] = 'Mit dieser Einstellung definieren Sie in welchem Monat das Sommersemester startet.';
$string['termpresentationasc'] = 'Ältere Semester zuerst, semesterunabhängiger Eintrag am Beginn der Liste';
$string['termpresentationdesc'] = 'Neuere Semester zuerst, semesterunabhängiger Eintrag am Ende der Liste';
$string['termpresentationorder'] = 'Darstellungsreihenfolge der Semester';
$string['termpresentationorder_desc'] = 'Mit dieser Einstellung definieren Sie wie die Liste der Semester innerhalb der Kurseinstellungen und (falls das Feld als Kursfilter verwendet wird) innerhalb des Kursübersichtsblocks auf dem Dashboard dargestellt wird.';
$string['wintersemester'] = 'WiSe {$a}';
$string['wintertermstartmonth'] = 'Der Monat in dem das Wintersemester startet';
$string['wintertermstartmonth_desc'] = 'Mit dieser Einstellung definieren Sie in welchem Monat das Wintersemester startet.';
