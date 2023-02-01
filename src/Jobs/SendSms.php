<?php

namespace Dinushchathurya\Websms\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;

class SendSms implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $numbers;
    protected $message;
    protected $scheduledate;

    public function __construct($numbers, $message, $scheduledate = null)
    {
        $this->numbers      = $numbers;
        $this->message      = $message;
        $this->scheduledate = $scheduledate ?: Carbon::now()->toDateTimeString();
    }

    public function handle()
    {
        try {
            
            $apiKey   = config('sms.api_key');
            $apiToken = config('sms.api_token');
            $senderId = config('sms.sender_id');
            $type     = config('sms.type');
            $route    = config('sms.route');

            foreach ($this->numbers as $number) {
                $url = "https://cloud.websms.lk/smsAPI?sendsms&apikey=" . $apiKey . "&apitoken=" . $apiToken . "&type=" .$type . "&from=" . $senderId . "&to=" . $number . "&text=" . urlencode($this->message) . "&scheduledate=" . urlencode($this->scheduledate) . "&route=" . $route;
                file_get_contents($url); 
            }

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}