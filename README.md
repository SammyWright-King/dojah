# dojah
php package library to handle the api calls to dojah platform


installation
PHP and Composer are both required to use this package

To use the latest version of Dojah php package in your project, simple require it like this

composer require muyiwa/dojah

or add the following line to the require block to your composer.json file and run composer install

"require": {
        "muyiwa/dojah": "v1.0.*"
},

Usage

require_once __DIR__ . '/vendor/autoload.php';
use muyiwa\dojah\Dojah;

create an instance of the Dojah class

$dojah = new Dojah();

to access the url, the base url needs to be specified depending on the mode you are on the dojah platform (i.e sandbox or live). Remember, the sandbox otherwise test mode is for testing purposes only while the live is for production.

//assign a base url

$dojah->setBaseUrl("current base url");

before gaining access to any endpoint, some extra header data are required like authorization and appid provided to you on your dojah platform.

//set authorization secret Key

$dojah->setSecretKey("Your secret key");

//set app id

$dojah->setAppId("your app id");

OR 

set both secret key and app id at once

$dojah->setheader("Your secret key", "Your app id");

now you can call methods on the dojah object created above

//to fetch your dojah balance

Full code

require_once __DIR__ . '/vendor/autoload.php';

use muyiwa\dojah\Dojah;

$dojah = new Dojah();

$dojah->setBaseUrl("https://sandbox.dojah.io");  //assign a base url

$dojah->setSecretKey("test_sk_hqnCg9JOYcIEeJN2QVMFIkiNU"); //set authorization secret Key

$dojah->setAppId("5fc9fd6eb8c8e4003e08df8b"); //set app id

echo $dojah->getBalance(); //to fetch your dojah balance

Result
{"entity":{"wallet_balance":"0.00"}}

$dojah->getBalance(); 

Result
{"entity":{"wallet_balance":"0.00"}}


other services includes
-> FINACIAL SERVICES

use muyiwa\dojah\Finance;

//instantiate the finance class
$finance = new Finance();

//get account information
$finance->getAccountInfo($account_id);

//get basic bvn information
$finance->basicBVN($account_id);

//get full bvn information
$finance->getFullBVN($account_id);

//get account transaction details from their bank
 $finance->getTransactions($account_id);

//retrieve recurring payments that occur periodically from transactions
$finance->subscriptions($account_id, $status = null, $start_date = null, $end_date = null)
where status is subscription that either "expired" or "not expired" which can be null
        start_date = transaction start date
        end_date = transaction end date


//get income pattern
$finance->fetchIncomePattern($account_id, $duration=null);

//get spending pattern
$finance->fetchSpendingPattern($account_id, $duration=null);


Full code

require_once __DIR__ . '/vendor/autoload.php';

use muyiwa\dojah\Finance;

$finance = new Finance();

$finance->setBaseUrl("https://sandbox.dojah.io");  //assign a base url

$finance->setSecretKey("test_sk_hqnCg9JOYcIEeJN2QVMFIkiNU"); //set authorization secret Key

$finance->setAppId("5fc9fd6eb8c8e4003e08df8b"); //set app id

$finance->getAccountInfo($account_id);

//get basic bvn information
$finance->basicBVN($account_id);

//get full bvn information
$finance->getFullBVN($account_id);

//get account transaction details from their bank
 $finance->getTransactions($account_id);

//retrieve recurring payments that occur periodically from transactions
$finance->subscriptions($account_id, $status = null, $start_date = null, $end_date = null)

//get income pattern
$finance->fetchIncomePattern($account_id, $duration=null);

//get spending pattern
$finance->fetchSpendingPattern($account_id, $duration=null);


->KYC SERVICES
use muyiwa\dojah\KYC;

//instantiate the finance class
$kyc = new KYC();

//lookup basic bvn
$kyc->lookUpBasicBvn($bvn);

//lookup full bvn
$kyc->lookupFullBvn($bvn);

//get customer information with the nuban
$kyc->getUserFromNuban($account_number, $bank_code);

//lookup tin
$kyc->lookupTIN($tin);

//lookup vin
$kyc->lookupVin($vin);

//lookup nin
$kyc->lookupNin($nin);

//lookup driver's license
$kyc->lookupDriverLicense($license_no, $dob);

//lookup CAC
$kyyc->lookupCAC($rc_no, $company_name);

//get users details from phone number
$kyc->lookupPhoneNo($number);

Full code

require_once __DIR__ . '/vendor/autoload.php';

use muyiwa\dojah\KYC;

$kyc = new KYC();

$kyc->setBaseUrl("https://sandbox.dojah.io");  //assign a base url

$kyc->setSecretKey("test_sk_hqnCg9JOYcIEeJN2QVMFIkiNU"); //set authorization secret Key

$kyc->setAppId("5fc9fd6eb8c8e4003e08df8b"); //set app id

//lookup basic bvn
$kyc->lookUpBasicBvn($bvn);

//lookup full bvn
$kyc->lookupFullBvn($bvn);

//get customer information with the nuban
$kyc->getUserFromNuban($account_number, $bank_code);

//lookup tin
$kyc->lookupTIN($tin);

//lookup vin
$kyc->lookupVin($vin);

//lookup nin
$kyc->lookupNin($nin);

//lookup driver's license
$kyc->lookupDriverLicense($license_no, $dob);

//lookup CAC
$kyyc->lookupCAC($rc_no, $company_name);

//get users details from phone number
$kyc->lookupPhoneNo($number);


->MESSAGE SERVICES
use muyiwa\dojah\Message;

//instantiate the finance class
$msg = new Message();

//get senders
$msg->getSenders();

//deliver transactional messages to your users via SMS or Whatsapp
$msg->sendMessage($priority, $channel, $message, $destination_no, $sender_id);

//register sender id/ request sender id
$msg->registerSenderId($sender_id);

//get message status
$msg->messageStatus($message_id);

//send otp
$msg->sendOTP($sender_id, $mobile_no, $channel);

//validate otp
$msg->validateOTP($code, $reference_id);

Full Code
require_once __DIR__ . '/vendor/autoload.php';

use muyiwa\dojah\Message;

$msg = new Message();

$msg->setBaseUrl("https://sandbox.dojah.io");  //assign a base url

$msg->setSecretKey("test_sk_hqnCg9JOYcIEeJN2QVMFIkiNU"); //set authorization secret Key

$msg->setAppId("5fc9fd6eb8c8e4003e08df8b"); //set app id

//get senders
$msg->getSenders();

//deliver transactional messages to your users via SMS or Whatsapp
$msg->sendMessage($priority, $channel, $message, $destination_no, $sender_id);

//register sender id/ request sender id
$msg->registerSenderId($sender_id);

//get message status
$msg->messageStatus($message_id);

//send otp
$msg->sendOTP($sender_id, $mobile_no, $channel);

//validate otp
$msg->validateOTP($code, $reference_id);
 

