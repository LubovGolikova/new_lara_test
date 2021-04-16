<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ProcessMail;

class ProcessMailController extends Controller
{
    public function sendEmail(Request $request)
    {
        ProcessMail::dispatch()->onQueue('weekly');


//        $emailJob = new ProcessMail();
//        dispatch($emailJob);
//        MatchSendEmail::dispatch($options)->onQueue(‘Email’);

//        /** Option 1 */
//        Queue::push(new MatchSendEmail($options));
//
//        /** Option 2 */
//        dispatch(new MatchSendEmail($options));
//
//        /** Option 3 */
//        (new MatchSendEmail($options))->dispatch();
//
//        /** Option 4 */
//        \App\Jobs\MatchSendEmail::dispatch($options);



//        ProcessMail::dispatch()->onQueue('weekly');
//        ProcessMail::dispatch($podcast)->delay(now()->addMinutes(10));
//        ProcessMail::withChain([new OptimizePodcast, new ReleasePodcast])->dispatch();
//        ProcessMail::dispatch($podcast)->onQueue('processing');


        //(Your job class)::dispatch(параметри);
        //$this->dispatch(new SendReminderEmail($user));
        //dispatch(new App\Jobs\PerformTask);
        //dispatch((new Job)->onQueue('high'));

////////
//        $podcast = ProcessMail::create(...);
//
//        // Create podcast...
//
//        ProcessMail::dispatch($podcast)->onConnection('sqs');
    }
}
