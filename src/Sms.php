<?php

namespace Dinushchathurya\Websms;

use Dinushchathurya\Websms\Jobs\SendSms;
use Illuminate\Support\Facades\Queue;

class Sms
{
    public function send($numbers, $message)
    {   
        Queue::push(new SendSms($numbers, $message));
    }
}
