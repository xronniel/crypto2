<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessage extends Mailable
{
    use SerializesModels;

    public $data;

    // Constructor to pass the data
    public function __construct($data)
    {
        $this->data = $data;
    }

    // Build the message
    public function build()
    {
        return $this->view('emails.contact') // Specify the view to render the email
                    ->subject('New Contact Message')
                    ->with('data', $this->data); // Pass data to the view
    }
}
