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

defined('MOODLE_INTERNAL') || die();

use core_payment\helper;

require_login();
require_once(__DIR__ . '/../../../config.php');
global $DB, $USER;

$component = required_param('component', PARAM_ALPHANUMEXT);
$paymentarea = required_param('paymentarea', PARAM_ALPHANUMEXT);
$itemid = required_param('itemid', PARAM_INT);
$config     = (object) helper::get_gateway_configuration($component, $paymentarea, $itemid, 'sslcommerz');

$valid = urlencode($_POST['val_id']);
$storeid = urlencode($config->storeid);
$storepasswd = urlencode($config->storepassword);
$requestedurl = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=" . $valid . "&store_id=" . $storeid . "&store_passwd=" . $storepasswd . "&v=1&format=json");

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $requestedurl);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

$result = curl_exec($handle);

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if ($code == 200 && !(curl_errno($handle))) {
    # TO CONVERT AS ARRAY
    # $result = json_decode($result, true);
    # $status = $result['status'];

    # TO CONVERT AS OBJECT
    $result = json_decode($result);
    die(var_dump($result));
    # TRANSACTION INFO
    $status = $result->status;
    $trandate = $result->tran_date;
    $tranid = $result->tran_id;
    $amount = $result->amount;
    $banktranid = $result->bank_tran_id;
    $cardtype = $result->card_type;
    $courseid = $result->value_d;

    //databaseinfo
    $data = new stdClass();
    $data->userid = $USER->id;
    $data->courseid = $courseid;
    $data->itemid = $itemid;
    $data->currency = $currency;
    $data->payment_status = $status;
    $data->txn_id = $tranid;
    $data->timeupdated = $trandate;
    $DB->insert_record('paygw_sslcommerz', $data);

    if ($status == "VALID") {
        header("Location: " . $CFG->wwwroot .
            '/payment/gateway/sslcommerz/success.php?id=' . $courseid .
            '&component=' . $component . '&paymentarea=' . $paymentarea .
            '&itemid=' . $itemid);
        exit();
    } else {
        header("Location: " . $CFG->wwwroot .
            '/payment/gateway/sslcommerz/cancel.php?id=' . $courseid);
        exit();
    }
} else {

    echo "Failed to connect with SSLCOMMERZ";
}
