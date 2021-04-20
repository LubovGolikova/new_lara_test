<?php

namespace App\Listeners;

use App\Events\UserWasBanned;
use App\Notifications\AnswerReceived;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Notification;
class EmailBanNotification
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
     * @param  UserWasBanned  $event
     * @return void
     */
    public function handle(UserWasBanned $event)
    {
        $user = \Auth::user();
        $userData = [];
        $userData['user_id'] = $user->id;
        Notification::send($user, new AnswerReceived($userData));
        $user->notify(new AnswerReceived($userData));
    }
}
