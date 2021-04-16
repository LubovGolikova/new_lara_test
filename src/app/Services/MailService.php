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
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function createMail(array $data)
    {
        try {
            $user = \Auth::user();
            $userEmail = [];
            $userEmail['email'] = $user->email;
            Mail::to($userEmail['email'])->send(new AnswerShipped($data));

        } catch (Exception $e) {
            $message = 'Could not create mail';
            $this->customLog($message, $e);
            return response()->json(['error' => $message], 500);
        }
    }

}
