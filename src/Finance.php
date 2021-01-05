<?php

namespace muyiwa\dojah;

class Finance extends Dojah{

    //fetch dojah balance
    public function getAccountInfo($account_id){
        $arr = [
            'account_id' => $account_id,
        ];
        return $this->runWithBody("/api/v1/financial/account_information", $arr, "GET");
    }

    //get basic bvn information
    public function basicBVN($account_id){
        $arr = [
            'account_id' => $account_id,
        ];
        return $this->runWithBody("/api/v1/financial/bvn_information", $arr, "GET");
    }

    //get full bvn information
    public function getFullBVN($account_id){
        $arr = [
            'account_id' => $account_id,
        ];
        return $this->runWithtBody("/financial/bvn_information", $arr, "GET");
    }

    //get account transaction details from their bank
    public function getTransactions($account_id){
        $arr = [
            'account_id' => $account_id,
        ];
        return $this->runWithBody("/api/v1/financial/account_transactions", $arr, "GET");
    }

    //retrieve recurring payments that occur periodically from transactions
    public function subscriptions($account_id, $status = null, $start_date = null, $end_date = null){
        $arr = [
            'account_id' => $account_id,
        ];
        if(isset($status)){
            $arr = [
                'status' => $status,
            ];
        }
        if(isset($start_date)){
            $arr = [
                'start_date' => $start_date,
            ];
        }if(isset($end_date)){
            $arr = [
                'end_date' => $end_date,
            ];
        }
        return $this->runWithBody("/api/v1/financial/account_subscription", $arr, "GET");
    }

    //get income pattern
    public function fetchIncomePattern($account_id, $duration=null){
        $arr = [
            'account_id' => $account_id,
        ];
        if(isset($duration)){
            $arr = [
                'duration' => $duration,
            ];
        }
        return $this->runWithBody("/api/v1/financial/income_pattern", $arr, "GET");

    }

    //get spending pattern
    public function fetchSpendingPattern($account_id, $duration=null){
        $arr = [
            'account_id' => $account_id,
        ];
        if(isset($duration)){
            $arr = [
                'duration' => $duration,
            ];
        }
        return $this->runWithBody("/api/v1/financial/spending_pattern", $arr, "GET");

    }
}
