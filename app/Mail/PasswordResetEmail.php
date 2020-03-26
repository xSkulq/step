<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PasswordResetEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
      $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $address = 'xskulq@gmail.com';
      $subject = 'This is a demo!';
      $name = 'STEP';
      
      return $this->view('emails.test')
                  ->from($address, $name)
                  ->cc($address, $name)
                  ->bcc($address, $name)
                  ->replyTo($address, $name)
                  ->subject($subject)
                  ->with([ 'test_message' => $this->data['message'] ]);
        //return $this->view('view.name');
    }
}
