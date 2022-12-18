<?php

namespace App\Jobs;
// namespace App\Mail;
// use Illuminate\Mailable\Mail;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestHelloEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TestSendEmail implements ShouldQueue
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
        // $email = new TestHelloEmail();  
        // Mail::to('muhamaddiaz44@gmail.com')->send($email);
        $email = new TestHelloEmail();
        Mail::to('muhamaddiaz44@gmail.com')->send($email);
    }
}
