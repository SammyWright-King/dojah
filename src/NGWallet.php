<?php

namespace muyiwa\dojah;

class NGWallet extends Dojah{
    /**
     * create wallet in naira and transfer to other naira accounts
     * required fields are bvn, firstname, lastname, phone number and dob
     * dob format would be 07-Aug-1958
     */
    public function createWallet($mobile, $dob, $firstname, $lastname, $middlename=NULL, $bvn=NULL){
        $arr = [
            "phone_number" => $mobile,
            "dob" => $dob,
            "first_name" => $firstname,
            "last_name" => $lastname
        ];
        if(isset($middlename)){
            $arr["middle_name"] = $middlename;
        }
        if(isset($bvn)){
            $arr['bvn'] = $bvn;
        }
        return $this->runWithBody("/api/v1/wallet/ngn/create", $arr, 'POST');
    }
    /**
     * Get wallet details
     * input wallet id as string
     */
    public function walletDetails($wallet_id){
        $arr = [
            "wallet_id" => $wallet_id
        ];
        return $this->runWithBody("/api/v1/wallet/ngn/retrieve", $arr, 'GET');
    }
    /**
     * transfer funds to other NG accounts
     * required paramets are wallet id(string), recipient account(number)
     * recipient bank code(nmber) amount(number)
     */
    public function transferFunds($wallet_id, $rec_act_no, $rec_bank_code, $amount, $remarks=NULL){
        $arr = [
            "wallet_id" => $wallet_id,
            "recipient_account_number" => $rec_act_no,
            "recipient_bank_code"  => $rec_bank_code,
            "amount" => $amount
        ];
        if(isset($remarks)){
            $arr['remarks'] = $remarks;
        }
        return $this->runWithBody("/api/v1/wallet/ngn/transfer", $arr, 'POST');
    }
    /**
     * transfer funds without the wallet id
     */
    public function transfer($rec_act_no, $rec_bank_code, $amount, $remarks=NULL){
        $arr = [
            "recipient_account_number" => $rec_act_no,
            "recipient_bank_code"  => $rec_bank_code,
            "amount" => $amount,
        ];
        if(isset($remark)){
            $arr['remarks'] = $remarks;
        }
        return $this->runWithBody("/api/v1/wallet/ngn/transfer/pool", $arr, 'POST');
    }
    /**
     * GET transaction details
     * required arguement is the transaction id
     */
    public function transactionDetail($transaction_id){
        $arr = [
            "transaction_id" => $transaction_id
        ];
        return $this->runWithBody("/api/v1/wallet/ngn/transaction", $arr, 'GET');
    }
    
}