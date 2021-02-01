<?php

namespace muyiwa\dojah;

class Dojah{
    public $baseUrl;
    protected $dojah_secret_key;
    protected $appId;


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

    //run without any body parameters, just continuation of site url
    public function runWithoutParam($site){
        $url = $this->baseUrl. $site;
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

    //run with additional body parameters and continuation of site url
    public function runWithParam($site, $arr){
        $url = $this->baseUrl. $site;

        $fields = $arr;

        $postRequest = http_build_query($fields);

        $cURLConnection = curl_init();
        curl_setopt($cURLConnection, CURLOPT_URL, $url);
        curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $postRequest);
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array(
            "Authorization: ". $this->dojah_secret_key ,
            "AppId: ". $this->appId,
        ));

        $result = curl_exec($cURLConnection);
        curl_close($cURLConnection);

        return $result;
    }

    //fetch dojah balance
    public function getBalance(){
        return $this->runWithoutParam("/api/v1/balance");
    }

    public function getBanks(){
        return $this->runWithoutParam("/api/v1/general/banks");
    }

     //run with additional body parameters, method and continuation of site url
    public function runWithBody($site, $arr, $method=null){
        $url = $this->baseUrl. $site;

        $fields = $arr;

        $postRequest = http_build_query($fields);

        $cURLConnection = curl_init();

        if($method == "GET"){
            //add param to url
            $url = $url."?".$postRequest;

            curl_setopt($cURLConnection, CURLOPT_URL, $url);
            curl_setopt($cURLConnection, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($cURLConnection, CURLOPT_FOLLOWLOCATION, TRUE);
        }
        else if($method == "POST"){
            curl_setopt($cURLConnection, CURLOPT_URL, $url);
            curl_setopt($cURLConnection, CURLOPT_POST, true);
            curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $postRequest);
            curl_setopt($cURLConnection, CURLOPT_CUSTOMREQUEST, $method);
        }
        curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array(
            "Authorization: ". $this->dojah_secret_key ,
            "AppId: ". $this->appId,
        ));
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($cURLConnection);

        //curl_close($cURLConnection);

        return $result;
    }
}
