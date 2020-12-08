<?php

namespace muyiwa\dojah;

class Billing extends Dojah{

    //buy airtime with destination numbers being an array of numbers or just one
    public function purchaseAirtime($amount, $destination_numbers){
        $arr = [
            'amount' => $amount,
            'destination' => $destination_numbers
        ];
        return $this->runWithParam('/api/v1/purchase/airtime', $arr);
    }

    //

    //buy airtime with destination number being an integer
    public function purchaseData($plan, $destination_number){
        $arr = [
            'plan' => $plan,
            'destination' => $destination_number
        ];
        return $this->runWithParam('/api/v1/purchase/data', $arr);
    }
}
