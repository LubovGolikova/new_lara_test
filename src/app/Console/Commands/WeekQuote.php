<?php

namespace App\Console\Commands;

use App\Jobs\ProcessMail;
use App\Traits\AnswerMailTrait;
use App\Traits\LogTrait;
use Illuminate\Console\Command;
use App\Models\User;

class WeekQuote extends Command
{
    use LogTrait,  AnswerMailTrait;
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
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function handle(): void
    {
        dispatch(new ProcessMail());
        $this->info('Email sent successfully.');
    }
}
