<?php

namespace App\Console\Commands;

use App\Jobs\ProcessMail;
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
     *
     */
    public function handle()
    {
//        $users = User::all();
//        foreach ($users as $user) {
//            // Send mail to user
//            dispatch(new ProcessMail($user));
//
//        }
        dispatch(new ProcessMail());
        $this->info('Email send  Successfully.');
       return -1;

    }
}
