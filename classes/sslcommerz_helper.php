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
 * Various helper methods for interacting with the sslcommerz API
 *
 * @package    paygw_sslcommerz
 * @copyright  2021 Brain station 23 ltd.
 * @author     Brain station 23 ltd.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace paygw_sslcommerz;

use sslcommerz\Exception\ApiErrorException;
use sslcommerz\sslcommerz;
use sslcommerz\sslcommerzClient;
use stdClass;

defined('MOODLE_INTERNAL') || die();

/**
 * The helper class for sslcommerz payment gateway.
 *
 * @copyright  2021 Brain station 23 ltd.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class sslcommerz_helper {

    /**
     * @var sslcommerzClient Secret API key (Do not publish).
     */
    private $sslcommerz;
    /**
     * @var string Public API key.
     */
    private $apiurl;

    /**
     * @var string Public Requested URL.
     */
    private $requestedurl;

    /**
     * @var string Public business store ID.
     */
    private $businessstoreid;

    /**
     * @var string Public business store password.
     */
    private $businessstorepassword;

    /**
     * @var string Public production environment.
     */
    private $productionenv;

    /**
     * Initialise the sslcommerz API client.
     *
     * @param string $apiurl
     * @param string $requestedurl
     * @param string $businessstoreid The business store id.
     * @param string $businessstorepassword business store password.
     * @param bool $productionenv Whether we are working with the sandbox environment or not.
     */
    public function __construct(string $apiurl, string $requestedurl, string $businessstoreid,
                                string $businessstorepassword, bool $productionenv) {
        $this->apiurl = $apiurl;
        $this->requestedurl = $requestedurl;
        $this->businessstoreid = $businessstoreid;
        $this->businessstorepassword = $businessstorepassword;
        $this->productionenv = $productionenv;

    }


    /**
     * Create a payment intent and return with the checkout session id.
     *
     * @param object $config
     * @param string $currency
     * @param string $description
     * @param float $cost
     * @param string $component
     * @param string $paymentarea
     * @param string $itemid
     * @return string
     * @throws ApiErrorException
     */
    public function generate_payment(object $config, string $currency, string $description, float $cost, string $component,
        string $paymentarea, string $itemid, int $courseid): void {
        global $CFG, $USER, $DB;
        $unitamount = $this->get_unit_amount($cost, $currency); // Price with surcharge.

        $currency = strtolower($currency);

        $cus_name = $USER->firstname . ' ' . $USER->lastname;
        $cus_email = $USER->email;
        $cus_add1 = $USER->address;
        $cus_city = $USER->city;
        $cus_country = $USER->country;
        $cus_phone = $USER->phone1;
        $productionenv = $config->productionenv;

        $postdata = array();
        $postdata['store_id'] = $config->businessstoreid;
        $postdata['store_passwd'] = $config->businessstorepassword;
        $postdata['total_amount'] = $unitamount;
        $postdata['tran_id'] = "MD_COURSE_" . uniqid();

        $postdata['success_url'] = $CFG->wwwroot . "/payment/gateway/sslcommerz/success.php?id=". $courseid;
        $postdata['fail_url'] = $CFG->wwwroot . "/payment/gateway/sslcommerz/fail.php?id=". $courseid;
        $postdata['cancel_url'] = $CFG->wwwroot . "/payment/gateway/sslcommerz/cancel.php?id=" . $courseid;
        $postdata['ipn_url'] = $CFG->wwwroot . "/payment/gateway/sslcommerz/ipn.php?id=". $courseid;

        $postdata['cus_add2'] = "";
        $postdata['cus_state'] = "";
        $postdata['cus_postcode'] = "1000";
        $postdata['cus_fax'] = "";

        // OPTIONAL PARAMETERS.
        $postdata['value_b'] = $courseid;
        $postdata['value_c'] = $USER->id;
        $postdata['value_d'] = $itemid;

        $data = new stdClass();

        $data->userid = $USER->id;
        $data->courseid = $courseid;
        $data->itemid = $itemid;
        $data->currency = $currency;
        $data->payment_status = 'Processing';
        $data->txn_id = $postdata['tran_id'];
        $data->timeupdated = time();

        $DB->insert_record("paygw_sslcommerz", $data);

        // REQUEST SEND TO SSLCOMMERZ.
        $directapiurl = $config->apiurl;

        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $directapiurl);   // The URL to fetch.
        curl_setopt($handle, CURLOPT_TIMEOUT, 30);
        curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($handle, CURLOPT_POST, 1);
        curl_setopt($handle, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, $productionenv); // KEEP IT FALSE IF YOU RUN FROM LOCAL PC.

        $content = curl_exec($handle);
        $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        if ($code == 200 && !(curl_errno($handle))) {
            curl_close($handle);
            $sslcommerzresponse = $content;
        } else {
            curl_close($handle);
            echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
            exit;
        }

        $_SESSION['courseid'] = $courseid;
        $_SESSION['itemid'] = $itemid;
        $_SESSION['userid'] = $USER->id;
        session_start();

        // PARSE THE JSON RESPONSE.
        $sslcz = json_decode($sslcommerzresponse, true);
        if (isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL'] != "") {
            // THERE ARE MANY WAYS TO REDIRECT - Javascript, Meta Tag or Php Header Redirect or Other.
            echo "<meta http-equiv='refresh' content='0;url=" . $sslcz['GatewayPageURL'] . "'>";
            exit;
        } else {
            echo "JSON Data parsing error!";
        }
    }


    /**
     * Convert the cost into the unit amount accounting for zero-decimal currencies.
     *
     * @param float $cost
     * @param string $currency
     * @return float
     */
    public function get_unit_amount(float $cost, string $currency): float {
        if (in_array($currency, gateway::get_zero_decimal_currencies())) {
            return $cost;
        }
        return $cost * 100;
    }
}
