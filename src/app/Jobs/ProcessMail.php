<?php

namespace App\Jobs;

use App\Events\UserWasSendEmail;
use App\Traits\AnswerMailTrait;
use App\Traits\AdminTrait;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, AnswerMailTrait,  AdminTrait;

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
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function handle(): void
    {
        try {
            $mostPopularAnswers = $this->mostPopularAnswers();
            foreach($mostPopularAnswers  as $answer) {
                $data = app()->make('AnswerService')->preparedDataToSendEmail($answer->id);
                app()->make('MailService')->createMail($data);

            }

            if(is_null( $user = \Auth::user())) {
                $admins = $this->receiveAdmin();
                event(new UserWasSendEmail($admins));

            } else {
                $user = \Auth::user();
                event(new UserWasSendEmail($user));
            }


        } catch (Exception $e) {
            $message = 'Could not  send most popular answer';
            $this->customLog($message, $e);
        }
    }

    /**
     * @param \Exception $exception
     * @throws \Exception
     */
    public function failed(\Exception $exception)
    {
        throw new \Exception("Error Processing the job", 1);
    }
}
