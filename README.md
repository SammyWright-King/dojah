# dojah
php package library to handle the api calls to dojah platform


installation
PHP and Composer are both required to use this package

To use the latest version of Dojah php package in your project, simple require it like this

composer require muyiwa/dojah

or add the following line to the require block to your composer.json file and run composer install

"require": {
        "muyiwa/dojah": "1.0.*"
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
$dojah->fetchBalance(); 


Full code

<?php
require_once __DIR__ . '/vendor/autoload.php';
use muyiwa\dojah\Dojah;

//assign a base url
$dojah->setBaseUrl("https://sandbox.dojah.io");

//set authorization secret Key
$dojah->setSecretKey("test_sk_hqnCg9JOYcIEeJN2QVMFIkiNU");

//set app id
$dojah->setAppId("5fc9fd6eb8c8e4003e08df8b");

//to fetch your dojah balance
echo $dojah->fetchBalance(); 

Result
{"entity":{"wallet_balance":"0.00"}}
