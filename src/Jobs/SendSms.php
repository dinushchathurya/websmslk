<?php

namespace Dinushchathurya\Websms\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendSms implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $numbers;
    protected $message;

    public function __construct($numbers, $message)
    {
        $this->numbers = $numbers;
        $this->message = $message;
    }

    public function handle()
    {
        $apiKey = config('sms.api_key');
        $apiToken = config('sms.api_token');
        $senderId = config('sms.sender_id');
        $route = config('sms.route');
        foreach ($this->numbers as $number) {
            $url = "https://cloud.websms.lk/smsAPI?sendsms&apikey=" . $apiKey . "&apitoken=" . $apiToken . "&type=sms&from=" . $senderId . "&to=" . $number . "&text=" . urlencode($this->message) . "&route=" . $route;
            file_get_contents($url);
        }
    }
}