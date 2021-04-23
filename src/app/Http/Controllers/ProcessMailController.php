<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ProcessMail;

class ProcessMailController extends Controller
{
    public function sendEmail(Request $request)
    {
//        ProcessMail::dispatch()->onQueue('weekly');

        $emailJob = new ProcessMail();
        $this->dispatch($emailJob);
    }
}
