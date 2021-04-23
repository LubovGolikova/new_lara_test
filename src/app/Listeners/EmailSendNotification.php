<?php

namespace App\Listeners;

use App\Events\UserWasSendEmail;
use App\Notifications\AnswerReceived;
use App\Traits\AdminTrait;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use App\Notifications\AdminNotification;

class EmailSendNotification implements ShouldQueue
{
    use AdminTrait;
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
        $admins = $this->receiveAdmin();
        Notification::send($admins, new AdminNotification($admins));
    }
}
