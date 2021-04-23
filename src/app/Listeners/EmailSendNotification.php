<?php

namespace App\Listeners;

use App\Events\UserWasSendEmail;
use App\Notifications\AnswerReceived;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Models\Answer;

class EmailSendNotification implements ShouldQueue
{
    public $user;

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
     * @param  UserWasSendEmail  $event
     * @return void
     */
    public function handle(UserWasSendEmail $event)
    {
//        $user = \Auth::user();
//        $answer = Answer::find(1);
//        Notification::send($user, new AnswerReceived($user, $answer));
//        $user->notify(new AnswerReceived($userData));
    }
}
