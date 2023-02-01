<?php

namespace Dinushchathurya\Websms;

use Dinushchathurya\Websms\Jobs\SendSms;
use Illuminate\Support\Facades\Queue;

class Sms
{
    public function send($numbers, $message, $scheduledate = null)
    {   
        Queue::push(new SendSms($numbers, $message, $scheduledate));
    }
}
