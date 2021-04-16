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
    protected $description = 'Respectively send 5 answers to all users weekly via email';

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
        $mostpopularAnswer = $this->mostPopularAnswer();
        $receiveTextAnswer = $this->receiveTextAnswer($mostpopularAnswer);
        $receiveTextQuestion = $this->receiveTextQuestion($mostpopularAnswer);
        $data = array(
            'questionTitleText' => $receiveTextQuestion['title'],
            'questionBodyText' => $receiveTextQuestion['body'],
            'answerBodyText' => $receiveTextAnswer['body']
        );
        $emailSend = app()->make('MailService')->createMail($data);
        $this->info('Email send  Successfully.');
    }
}
