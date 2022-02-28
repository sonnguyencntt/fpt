<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Daanra\LaravelLetsEncrypt\Facades\LetsEncrypt;

class CreateLetsEncryptSsl implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            LetsEncrypt::createNow('dep-digital-gitech.tk');
            // LetsEncrypt::certificate('dep-digital-gitech.tk')
            // ->delay(5)
            // ->retryAfter(4)
            // ->setTries(4)
            // ->setRetryList([1, 5, 10])
            // ->create(); // or ->renew()
        } catch (\Throwable $th) {
            \Log::channel("jobs")->info("Lỗi letsEncrypt" . $th);
        }
    }
}
