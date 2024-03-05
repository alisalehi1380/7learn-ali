<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Notifications\Channels\NasrpayamSmsChannel;
use Illuminate\Notifications\Notification;

class SmsNotification extends Notification
{
    use Queueable;
    
    private string $recipient;
    private string $message;
    
    public function __construct(string $message, string $recipient)
    {
        $this->recipient = $recipient;
        $this->message = $message;
    }
    
    public function via(): array
    {
        return [NasrpayamSmsChannel::class];
    }
    
    public function data(): array
    {
        return [
            'recipient' => $this->recipient,
            'message'   => $this->message,
            'pattern'   => 'abc'
        ];
    }
}
