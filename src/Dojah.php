<?php

class Dojah{
    public $baseUrl;
    private $dojah_key;

    public function __construct(){
        $this->baseUrl = env('DOJAH_BASE_URL');
        $this->dojah_secret_key = env('DOJAH_SECRET_KEY');
    }

    //fetch balance
    public function fetchBalance(){

        $url = env('DOJAH_BASE_URL'). "/api/v1/balance";
        $cURLConnection = curl_init();

        curl_setopt($cURLConnection, CURLOPT_URL, $url);
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array(
            "Authorization: ". env('DOJAH_SECRET_KEY'),
            "AppId: " .env('DOJAH_APP_ID'),
        ));

        $balance = curl_exec($cURLConnection);
        //curl_close($cURLConnection);

        return $balance;


    }
}
