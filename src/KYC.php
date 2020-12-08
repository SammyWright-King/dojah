<?php

namespace muyiwa\dojah;

class KYC extends Dojah
{
    public function lookUpBasicBvn($bvn)
    {
        $arr = [
            "bvn" => $bvn
        ];
        return $this->runWithParam('/api/v1/kyc/bvn/basic', $arr);
    }

    //lookup full bvn
    public function lookUpFullBvn($bvn)
    {
        $arr = [
            "bvn" => $bvn
        ];
        return $this->runWithParam('/api/v1/kyc/bvn/full', $arr);
    }

    //get customer information with the nuban
    public function getUserFromNuban($account_number, $bank_code)
    {
        $arr = [
            "account_number" => $account_number,
            "bank_code" => $bank_code
        ];
        return $this->runWithParam('/api/v1/kyc/bvn/full', $arr);

    }

    //lookup tin
    public function lookupTIN($tin){
        $arr = [
            'tin' => $tin
        ];
        return $this->runWithParam('/api/v1/kyc/tin', $arr);
    }

    //lookup vin, read documentation on usage
    public function lookupVIN($mode, $state, $lastname, $vin){
        $arr = [
            'mode' => $mode,
            'lastname' => $lastname,
            'state' => $state,
            'vin' => $vin
        ];
        return $this->runWithParam('/api/v1/kyc/vin', $arr);
    }

    //lookup nin, fetch customers details using the National Identification Number(NIN) of the customer
    public function lookupNIN($nin){
        $arr = [
            'nin' => $nin
        ];
        return $this->runWithParam('/api/v1/kyc/nin/', $arr);
    }

    //This endpoint allows you to validate the customer's Driver's license using the driving license number of the customer.
    public function lookupDriverLicense($license_no, $dob){
        $arr = [
            'license_number' => $license_no,
            'dob' => $dob
        ];
        return $this->runWithParam('/api/v1/kyc/dl', $arr);
    }

    //This endpoint allows developers to fetch CAC  information of customers' company/organization.
    public function getCAC($rc_no, $company_name){
        $arr = [
            'rc_number' => $rc_no,
            'company_name' => $company_name
        ];
        return $this->runWithParam('/api/v1/kyc/cac', $arr);
    }

}