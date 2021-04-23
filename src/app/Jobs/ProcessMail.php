<?php

namespace App\Jobs;

use App\Events\UserWasSendEmail;
use App\Traits\AnswerMailTrait;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, AnswerMailTrait;

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
        $mostPopularAnswers = $this->mostPopularAnswers();
        foreach($mostPopularAnswers  as $answer) {
            $data = app()->make('AnswerService')->createData($answer->id);
            app()->make('MailService')->createMail($data);

        }
        $user = \Auth::user();
        event(new UserWasSendEmail($user));
        return;
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
