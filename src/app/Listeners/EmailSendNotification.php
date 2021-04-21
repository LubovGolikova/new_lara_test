<?php

namespace App\Listeners;

use App\Events\UserWasSendEmail;
use App\Notifications\AnswerReceived;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Notification;
class EmailSendNotification
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
     * @param  UserWasSendEmail  $event
     * @return void
     */
    public function handle(UserWasSendEmail $event)
    {
        $user = \Auth::user();
        $userData = [];
        $userData['user_id'] = $user->id;

//        Notification::send($user, new AnswerReceived($userData));
//        $user->notify(new AnswerReceived($userData));
    }
}
