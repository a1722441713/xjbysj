<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendForm extends Mailable
{
    use Queueable, SerializesModels;

    public $url;
    public $subject = "心理测试考核";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($form_url)
    {
        $this->url = route('show.paper',$form_url);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('frontend.email');
    }
}
