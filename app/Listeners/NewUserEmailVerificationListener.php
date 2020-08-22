<?php

namespace App\Listeners;

use App\Events\NewUserEmailVerificationEvent;
use App\Mail\EmailVerificationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NewUserEmailVerificationListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewUserEmailVerificationEvent  $event
     * @return void
     */
    public function handle(NewUserEmailVerificationEvent $event)
    {
        Mail::to($event->user->email)->send(new EmailVerificationMail($event->user));
    }
}
