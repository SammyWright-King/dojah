<?php

namespace muyiwa\dojah;

class Message extends Dojah{

  

    //get message senders
    public function getSenders(){
       return $this->runWithoutParam('/api/v1/messaging/sender_ids');
    }

    //deliver transactional messages to your users via SMS or Whatsapp
    public function sendMessage($priority, $channel, $message, $destination_no, $sender_id){
        $arr = [
            "channel" => $channel,
            "message" => $message,
            "destination" => $destination_no,
            "sender_id" => $sender_id
        ];
        return $this->runWithBody("/api/v1/messaging/sms", $arr, 'POST');
    
    }

    //register sender id/ request sender id
    public function registerSenderId($sender_id){
        $arr = [
            'sender_id' => $sender_id
        ];
        return $this->runWithBody('/api/v1/messaging/sender_id', $arr, 'POST');
    }

    //get message status
    public function messageStatus($message_id){
        $arr = [
            'message_id' => $message_id
        ];
        return $this->runWithBody('/api/v1/messaging/sms/get_status', $arr, 'GET');
    }

    //send otp
    public function sendOTP( $sender_id, $mobile_no, $channel, $length=6, $expiry= 10){
        $arr = [
            'sender_id' => $sender_id,
            'destination' => $mobile_no,
            'channel' => $channel
        ];

        if(isset($expiry)){
            $arr['expiry'] = $expiry;
        }
        if(isset($length)){
            $arr['length'] = $length;
        }

        return $this->runWithBody('/api/v1/messaging/otp', $arr, 'POST');
    }

    //validate OTP
    public function validateOTP($code, $reference_id){
        $arr = [
            'code' => $code,
            'reference_id' => $reference_id
        ];
        return $this->runWithBody('/api/v1/messaging/otp/validate', $arr, "GET");

    }

}
