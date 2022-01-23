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
 * sslcommerz enrolments plugin settings and presets.
 *
 * @package    paygw_sslcommerz
 * @copyright  2021 Brain station 23 ltd.
 * @author     Brain station 23 ltd.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once("../../../config.php");
require_login();

use core_payment\helper;
use paygw_sslcommerz\sslcommerz_helper;

global $DB, $USER, $OUTPUT, $CFG, $PAGE;

require_once($CFG->dirroot . '/course/lib.php');

$courseid = $_SESSION['courseid'];
$itemid = $_SESSION['itemid'];
$userid = $_SESSION['userid'];


$data = $DB->get_record('paygw_sslcommerz', array("userid" => $userid, "courseid" => $courseid), '*', IGNORE_MULTIPLE);

$url = new moodle_url('/course/view.php?id='. $courseid);

$plugin = enrol_get_plugin('fee');
$plugininstance = $DB->get_record("enrol", array("id" => $data->itemid, "enrol" => "fee", "status" => 0));

$plugin->enrol_user($plugininstance, $userid, $plugininstance->roleid);

redirect($url, get_string('paymentsuccessful', 'paygw_sslcommerz'), 0, 'success');

