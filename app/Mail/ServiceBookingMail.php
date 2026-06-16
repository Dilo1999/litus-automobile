<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ServiceBookingMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public array $data
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Service Center Booking - LITUS Automobiles',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.service-booking',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
