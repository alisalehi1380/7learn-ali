<?php

namespace App\Notifications\Channels;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class NasrpayamSmsChannel
{
    public function send($notifiable, Notification $notification): void
    {
        $apiKey = env('SMS_API_KEY');
        $data = $notification->data();
        $client = new \IPPanel\Client($apiKey);
        
        try {
//            $client->sendPattern(
//                $data['pattern'],
//                "3000505",
//                $data['recipient'],
//                $this->getMessage($data),
//            );
        } catch (\Error $e) { // ippanel error
            Log::error($e->getCode(), 'SMS was not sent! | error from ippanel(nasrpayam sms)');
        }
    }
    
    private function getMessage(array $data): array
    {
        unset($data['pattern'], $data['recipient']);
        return $data;
    }
}
