<?php

namespace muyiwa\dojah;

class KYC extends Dojah
{

    public function lookUpBasicBvn($bvn)
    {
        $arr = [
            "bvn" => $bvn
        ];
        return $this->runWithBody('/api/v1/kyc/bvn/basic', $arr,  "GET");
    }

    //lookup full bvn
    public function lookUpFullBvn($bvn)
    {
        $arr = [
            "bvn" => $bvn
        ];
        return $this->runWithBody('/api/v1/kyc/bvn/full', $arr,  'GET');
    }

    //get customer information with the nuban
    public function getUserFromNuban($account_number, $bank_code)
    {
        $arr = [
            "account_number" => $account_number,
            "bank_code" => $bank_code
        ];
        return $this->runWithBody('/api/v1/kyc/nuban', $arr, 'GET');

    }

    //lookup tin
    public function lookupTIN($tin){
        $arr = [
            'tin' => $tin
        ];
        return $this->runWithBody('/api/v1/kyc/tin', $arr, 'GET');
    }

    //lookup vin, read documentation on usage
    public function lookupVIN($mode, $state, $lastname, $vin){
        $arr = [
            'mode' => $mode,
            'lastname' => $lastname,
            'state' => $state,
            'vin' => $vin
        ];
        return $this->runWithBody('/api/v1/kyc/vin', $arr, "GET");
    }

    //lookup nin, fetch customers details using the National Identification Number(NIN) of the customer
    public function lookupNIN($nin){
        $arr = [
            'nin' => $nin
        ];
        return $this->runWithBody('/api/v1/kyc/nin/', $arr, "GET");
    }

    //This endpoint allows you to validate the customer's Driver's license using the driving license number of the customer.
    public function lookupDriverLicense($license_no, $dob){
        $arr = [
            'license_number' => $license_no,
            'dob' => $dob
        ];
        return $this->runWithBody('/api/v1/kyc/dl', $arr, "GET");
    }

    //This endpoint allows developers to fetch CAC  information of customers' company/organization.
    public function lookupCAC($rc_no, $company_name){
        $arr = [
            'rc_number' => $rc_no,
            'company_name' => $company_name
        ];
        return $this->runWithBody('/api/v1/kyc/cac', $arr, "GET");
    }
    
    //This endpoint gets user details from phonenumber
    public function lookupPhoneNo($number){
        $arr = [
            'phone_number' => $number
        ];
        return $this->runWithBody('/api/v1/kyc/phone_number', $arr, "GET");
    }
}