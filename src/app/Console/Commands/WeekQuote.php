<?php

namespace App\Console\Commands;

use App\Traits\AnswerMailTrait;
use Illuminate\Console\Command;

class WeekQuote extends Command
{
    use AnswerMailTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quote:weekly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Respectively send 5 top rated answers to all the users have top receive weekly via email';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function handle()
    {
//        $mostpopularAnswers = $this->mostPopularAnswer();
//        $receiveTextQuestions = $this->receiveTextQuestion($mostpopularAnswers);
//        $data = array(
//            'questionTitleText' => $receiveTextQuestion['title'],
//            'questionBodyText' => $receiveTextQuestion['body'],
//            'answerBodyText' =>
//        );
//        $emailSend = app()->make('MailService')->createMail($data);
        $this->info('Email send  Successfully.');
    }
}
