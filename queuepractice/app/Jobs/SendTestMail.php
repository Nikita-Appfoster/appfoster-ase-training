<?php

namespace App\Jobs;

use App\Mail\UserMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;


class SendTestMail implements ShouldQueue
{
    use Queueable;
    protected $user;

    /**
     * Create a new job instance.
     */

 
    public function __construct($user)
    {
        $this->user=$user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
    Mail::to($this->user->email)->send(new UserMail($this->user));
    }
};
