<?php

namespace App\Jobs;

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
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        $mostPopularAnswers = $this->mostPopularAnswers();
//        foreach($mostPopularAnswers  as $answer) {
//            $data = app()->make('AnswerService')->createData($answer);
//
//        }
        $data = array('name' => 'vikas', 'message' => 'test message');
        app()->make('MailService')->createMail($data);

    }

    public function failed(\Exception $exception)
    {
        throw new \Exception("Error Processing the job", 1);
        // Send user notification of failure, etc...
    }
}
