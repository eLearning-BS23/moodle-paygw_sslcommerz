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
 * Strings for component 'paygw_sslcommerz', language 'en'
 *
 * @package    paygw_sslcommerz
 * @copyright  2021 Brain station 23 ltd.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['pluginname'] = 'SSLCommerz';
$string['paygw_sslcommerz'] = 'paygw_sslcommerz';
$string['pluginname_desc'] = 'The sslcommerz plugin allows you to receive payments via sslcommerz.';
$string['gatewayname'] = 'sslcommerz';
$string['apikey'] = 'API Key';
$string['apikey_help'] = 'The API key that we use to identifier ourselves with sslcommerz';
$string['secretkey'] = 'Secret Key';
$string['secretkey_help'] = 'Secret key to authenticate with sslcommerz';
$string['paymentmethods'] = 'Payment Methods';
$string['allowpromotioncodes'] = 'Allow Promotion Codes';
$string['gatewaydescription'] = 'SSLCommerz is an authorised payment gateway provider for processing Mobile Banking, Credit Card, Internet Banking transactions.';
$string['sslcommerzaccount'] = 'sslcommerz account ID';
$string['sslcommerzaccount_help'] = 'For creating the direct charge branding page';
$string['paymentsuccessful'] = 'Payment was successful';
$string['paymentcancelled'] = 'Payment was cancelled';
$string['customerdescription'] = 'Moodle User ID: {$a}';
$string['enableautomatictax'] = 'Enable automatic tax';
$string['enableautomatictax_desc'] = 'Automatic tax must be enabled and configured in the sslcommerz dashboard.';
$string['productionenv'] = 'Environment';
$string['productionenv_help'] = 'Choose your Production Environment';

$string['taxbehavior:sandbox'] = 'Sandbox';
$string['taxbehavior:live'] = 'Live';

$string['paymentmethod:card'] = 'Card';
$string['paymentmethod:alipay'] = 'Alipay';
$string['paymentmethod:bancontact'] = 'Bancontact';
$string['paymentmethod:eps'] = 'EPS';
$string['paymentmethod:giropay'] = 'giropay';
$string['paymentmethod:ideal'] = 'iDEAL';
$string['paymentmethod:p24'] = 'P24';
$string['paymentmethod:sepa_debit'] = 'SEPA Direct Debit';
$string['paymentmethod:sofort'] = 'Sofort';
$string['paymentmethod:upi'] = 'UPI';
$string['paymentmethod:netbanking'] = 'NetBanking';

$string['privacy:metadata:sslcommerz_customers'] = 'Stores the relation from Moodle users to sslcommerz customer objects';
$string['privacy:metadata:sslcommerz_customers:userid'] = 'Moodle user ID';
$string['privacy:metadata:sslcommerz_customers:customerid'] = 'Customer ID returned from sslcommerz';

$string['assignrole'] = 'Assign role';
$string['businessemail'] = 'sslcommerz business email';
$string['businessstoreid'] = 'Store Id';
$string['businessstorepassword'] = 'Store Password';
$string['businessemail_desc'] = 'The email address of your business sslcommerz account';
$string['businessstoreid_help'] = 'The Store Id Provided from sslcommerz';
$string['businessstorepassword_help'] = 'The Store Password Provided from sslcommerz';
$string['cost'] = 'Enrol cost';
$string['costerror'] = 'The enrolment cost is not numeric';
$string['costorkey'] = 'Please choose one of the following methods of enrolment.';
$string['currency'] = 'Currency';
$string['defaultrole'] = 'Default role assignment';
$string['defaultrole_desc'] = 'Select role which should be assigned to users during sslcommerz enrolments';
$string['enrolenddate'] = 'End date';
$string['enrolenddate_help'] = 'If enabled, users can be enrolled until this date only.';
$string['enrolenddaterror'] = 'Enrolment end date cannot be earlier than start date';
$string['enrolperiod'] = 'Enrolment duration';
$string['enrolperiod_desc'] = 'Default length of time that the enrolment is valid. If set to zero, the enrolment duration will be unlimited by default.';
$string['enrolperiod_help'] = 'Length of time that the enrolment is valid, starting with the moment the user is enrolled. If disabled, the enrolment duration will be unlimited.';
$string['enrolstartdate'] = 'Start date';
$string['enrolstartdate_help'] = 'If enabled, users can be enrolled from this date onward only.';
$string['errdisabled'] = 'The sslcommerz enrolment plugin is disabled and does not handle payment notifications.';
$string['erripninvalid'] = 'Instant payment notification has not been verified by sslcommerz.';
$string['errsslcommerzconnect'] = 'Could not connect to {$a->url} to verify the instant payment notification: {$a->result}';
$string['expiredaction'] = 'Enrolment expiry action';
$string['expiredaction_help'] = 'Select action to carry out when user enrolment expires. Please note that some user data and settings are purged from course during course unenrolment.';
$string['mailadmins'] = 'Notify admin';
$string['mailstudents'] = 'Notify students';
$string['mailteachers'] = 'Notify teachers';
$string['messageprovider:enrol_sslcommerz'] = 'Sslcommerz enrolment messages';
$string['nocost'] = 'There is no cost associated with enrolling in this course!';
$string['sslcommerz:config'] = 'Configure sslcommerz enrol instances';
$string['sslcommerz:manage'] = 'Manage enrolled users';
$string['sslcommerz:unenrol'] = 'Unenrol users from course';
$string['sslcommerz:unenrolself'] = 'Unenrol self from the course';
$string['sslcommerzaccepted'] = 'sslcommerz payments accepted';
$string['pluginname'] = 'sslcommerz';
$string['pluginname_desc'] = 'The sslcommerz module allows you to set up paid courses.  If the cost for any course is zero, then students are not asked to pay for entry.  There is a site-wide cost that you set here as a default for the whole site and then a course setting that you can set for each course individually. The course cost overrides the site cost.';
$string['privacy:metadata:enrol_sslcommerz:enrol_sslcommerz'] = 'Information about the sslcommerz transactions for sslcommerz enrolments.';
$string['privacy:metadata:enrol_sslcommerz:enrol_sslcommerz:business'] = 'Email address or sslcommerz account ID of the payment recipient (that is, the merchant).';
$string['privacy:metadata:enrol_sslcommerz:enrol_sslcommerz:courseid'] = 'The ID of the course that is sold.';
$string['privacy:metadata:enrol_sslcommerz:enrol_sslcommerz:instanceid'] = 'The ID of the enrolment instance in the course.';
$string['privacy:metadata:enrol_sslcommerz:enrol_sslcommerz:item_name'] = 'The full name of the course that its enrolment has been sold.';
$string['privacy:metadata:enrol_sslcommerz:enrol_sslcommerz:memo'] = 'A note that was entered by the buyer in sslcommerz website payments note field.';
$string['privacy:metadata:enrol_sslcommerz:enrol_sslcommerz:option_selection1_x'] = 'Full name of the buyer.';
$string['privacy:metadata:enrol_sslcommerz:enrol_sslcommerz:parent_txn_id'] = 'In the case of a refund, reversal, or canceled reversal, this would be the transaction ID of the original transaction.';
$string['privacy:metadata:enrol_sslcommerz:enrol_sslcommerz:payment_status'] = 'The status of the payment.';
$string['privacy:metadata:enrol_sslcommerz:enrol_sslcommerz:payment_type'] = 'Holds whether the payment was funded with an eCheck (echeck), or was funded with sslcommerz balance, credit card, or instant transfer (instant).';
$string['privacy:metadata:enrol_sslcommerz:enrol_sslcommerz:pending_reason'] = 'The reason why payment status is pending (if that is).';
$string['privacy:metadata:enrol_sslcommerz:enrol_sslcommerz:reason_code'] = 'The reason why payment status is Reversed, Refunded, Canceled_Reversal, or Denied (if the status is one of them).';
$string['privacy:metadata:enrol_sslcommerz:enrol_sslcommerz:receiver_email'] = 'Primary email address of the payment recipient (that is, the merchant).';
$string['privacy:metadata:enrol_sslcommerz:enrol_sslcommerz:receiver_id'] = 'Unique sslcommerz account ID of the payment recipient (i.e., the merchant).';
$string['privacy:metadata:enrol_sslcommerz:enrol_sslcommerz:tax'] = 'Amount of tax charged on payment.';
$string['privacy:metadata:enrol_sslcommerz:enrol_sslcommerz:timeupdated'] = 'The time of Moodle being notified by sslcommerz about the payment.';
$string['privacy:metadata:enrol_sslcommerz:enrol_sslcommerz:txn_id'] = 'The merchant\'s original transaction identification number for the payment from the buyer, against which the case was registered';
$string['privacy:metadata:enrol_sslcommerz:enrol_sslcommerz:userid'] = 'The ID of the user who bought the course enrolment.';
$string['privacy:metadata:enrol_sslcommerz:sslcommerz_com'] = 'The sslcommerz enrolment plugin transmits user data from Moodle to the sslcommerz website.';
$string['privacy:metadata:enrol_sslcommerz:sslcommerz_com:address'] = 'Address of the user who is buying the course.';
$string['privacy:metadata:enrol_sslcommerz:sslcommerz_com:city'] = 'City of the user who is buying the course.';
$string['privacy:metadata:enrol_sslcommerz:sslcommerz_com:country'] = 'Country of the user who is buying the course.';
$string['privacy:metadata:enrol_sslcommerz:sslcommerz_com:custom'] = 'A hyphen-separated string that contains ID of the user (the buyer), ID of the course, ID of the enrolment instance.';
$string['privacy:metadata:enrol_sslcommerz:sslcommerz_com:email'] = 'Email address of the user who is buying the course.';
$string['privacy:metadata:enrol_sslcommerz:sslcommerz_com:first_name'] = 'First name of the user who is buying the course.';
$string['privacy:metadata:enrol_sslcommerz:sslcommerz_com:last_name'] = 'Last name of the user who is buying the course.';
$string['privacy:metadata:enrol_sslcommerz:sslcommerz_com:os0'] = 'Full name of the buyer.';
$string['processexpirationstask'] = 'sslcommerz enrolment send expiry notifications task';
$string['sendpaymentbutton'] = 'Send payment via sslcommerz';
$string['status'] = 'Allow sslcommerz enrolments';
$string['status_desc'] = 'Allow users to use sslcommerz to enrol into a course by default.';
$string['transactions'] = 'sslcommerz transactions';
$string['unenrolselfconfirm'] = 'Do you really want to unenrol yourself from course "{$a}"?';
$string['paymendue'] = 'Amount paid is not enough "{$a}"?';
$string['coursemissing'] = 'Course "{$a}" doesn\'t exist';
$string['usermissing'] = 'User {$a} doesn\'t exist';
$string['pluginname'] = 'sslcommerz';
$string['paymenterror'] = 'Error updating record: Something went wrong';
$string['paymentfail'] = 'Payment was not valid. Please contact with the merchant.';
$string['paymentinvalid'] = 'Invalid Information.';
$string['apiurl_help'] = 'sslcommerz Api v3 url';
$string['apiurl'] = 'Api Url';
$string['requestedurl'] = 'Requested Url';
$string['requestedurl_help'] = 'Requested Url Without parameter';
$string['course'] = 'Course';
$string['productionenv'] = 'Production Environment';
$string['productionenv_desc'] = 'Production Environment of #SSLCommerz True/False';
$string['button_name'] = 'PAY NOW';
$string['paymentpage'] = 'Payment Page';
$string['paymentfailed'] = 'Payment Failed..Please try again.';
$string['paymentcancelled'] = 'Payment Cancelled.';
