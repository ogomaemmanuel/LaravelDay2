<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BlogObserverMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $blog;

    public function __construct($blog)
    {
        $this->blog = $blog;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //      $this->user= User::all()->first();
//
//      Mail::queue("emails.send",function ($message)
//      {
//          $message->from('eogoma@gmail.com', 'Emmanuel');
//          $message->subject("New blog has just been posted");
//      });
//
//      dd("Mail sent");
        return $this->from('eogoma@gmail.com', 'Emmanuel')
            ->subject("New blog has just been posted")
            ->view('emails.send');
    }
}
