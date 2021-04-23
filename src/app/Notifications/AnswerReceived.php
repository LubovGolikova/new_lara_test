<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use App\Models\Answer;
use App\Models\User;

class AnswerReceived extends Notification implements ShouldQueue
{
    use Queueable;
    protected $answer;
    protected $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, Answer $answer)
    {
        $this->user = $user;
        $this->answer = $answer;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the DB representation of the notification.
     * @param $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'User' => $this->user->id,
            'Answer' => $this->answer->id,
        ];
    }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
