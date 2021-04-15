<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class WeekQuote extends Command
{
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
        $emailSend = app()->make('MailService')->createMail();
        $this->info('Email send  Successfully.');
    }
}
