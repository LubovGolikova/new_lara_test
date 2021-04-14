<?php


namespace App\Services;

use App\Mail\AnswerShipped;
use App\Traits\LogTrait;
use Illuminate\Support\Facades\Mail;
use Exception;

class MailService
{
    use LogTrait;


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function createMail()
    {
        try {
            $user = \Auth::user();
            Mail::to($user->email)->send(new AnswerShipped());

        } catch(Exception $e) {
            $message = 'Could not create mail';
            $this->customLog($message, $e);
            return response()->json(['error' => $message], 500);
        }
    }

}
