<?php

namespace muyiwa\dojah;

class CryptoWallet extends Dojah{
    /**
     * create wallet
     * required is string currency you want to create
     * BTC, ETH, XRP ...
     */
    public function createWallet($curr){
        if($curr === 'XRP' || $curr === 'BTC' || $curr === 'ETH'){
            $arr = [
                "wallet_type" => $curr
            ];
            return $this->runWithBody("/api/v1/wallet/create", $arr, 'POST');
        }else{
            return 'Currency Not available';
        }
    }

    /**
     * get wallet details
     * required parameter is the wallet id of type string
     */
    public function walletDetails($wallet_id){
        $arr = [
            "wallet_id" => $wallet_id
        ];
        return $this->runWithBody("/api/v1/wallet", $arr, 'GET');
    }
}