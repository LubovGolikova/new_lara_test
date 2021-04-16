<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AnswerShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * AnswerShipped constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return AnswerShipped
     */
    public function build()
    {
        $from = env('MAIL_FROM_ADDRESS');
        return $this->from($from)
            ->markdown('email', ['data' => $this->data]);
    }
}
