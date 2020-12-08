<?php

namespace muyiwa\dojah;

class Finance extends Dojah{

    //fetch dojah balance
    public function getAccountInfo($account_id){
        $arr = [
            'account_id' => $account_id,
        ];
        return $this->runWithParam("/api/v1/financial/account_information", $arr);
    }

    //get basic bvn information
    public function basicBVN($account_id){
        $arr = [
            'account_id' => $account_id,
        ];
        return $this->runWithParam("/api/v1/financial/bvn_information", $arr);
    }

    //get full bvn information
    public function getFullBVN($account_id){
        $arr = [
            'account_id' => $account_id,
        ];
        return $this->runWithtParam("/financial/bvn_information", $arr);
    }

    //get account transaction details from their bank
    public function getTransactions($account_id){
        $arr = [
            'account_id' => $account_id,
        ];
        return $this->runWithParam("/api/v1/financial/account_transactions", $arr);
    }
}
