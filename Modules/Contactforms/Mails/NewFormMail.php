<?php

namespace TypiCMS\Modules\Contactforms\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use TypiCMS\Modules\Contactforms\Models\Contactform;

class NewFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Contactform $contactform
    )
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Contact Form',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'contactforms::emails.new-form',
        );
    }
}
