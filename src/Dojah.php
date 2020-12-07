<?php

namespace muyiwa\dojah;

class Dojah{
    public $baseUrl;
    private $dojah_secret_key;
    private $appId;


    //set base url
    public function setBaseUrl($base_url){
        $this->baseUrl = $base_url;
    }

    //public get base url
    public function getBaseUrl(){
        return $this->baseUrl;
    }

    //set dojah app id
    public function setAppId($app_id){
        $this->appId = $app_id;
    }

    //get dojah app id
    public function getAppId(){
        return $this->appId;
    }

    //set dojah secret key
    public function setSecretkey($secret_key){
        $this->dojah_secret_key = $secret_key;
    }

    //get dojah secret key
    public function getSecretkey(){
        return $this->dojah_secret_key;
    }

    //set dojah header parameters
    public function setHeader($secretKey, $app_id){
        $this->dojah_secret_key = $secretKey;
        $this->appId = $app_id;
    }

    //get dojah header parameters
    public function getHeader(){
        return [
             $this->dojah_secret_key,
             $this->appId
        ];
    }

    //fetch balance
    public function fetchBalance(){

        $url = $this->baseUrl. "/api/v1/balance";
        $cURLConnection = curl_init();

        curl_setopt($cURLConnection, CURLOPT_URL, $url);
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array(
            "Authorization: ". $this->dojah_secret_key ,
            "AppId: ". $this->appId,
        ));

        $balance = curl_exec($cURLConnection);
        //curl_close($cURLConnection);

        return $balance;


    }
}
