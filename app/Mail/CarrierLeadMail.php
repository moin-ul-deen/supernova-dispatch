<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CarrierLeadMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $leadData;

    public function __construct(array $leadData)
    {
        $this->leadData = $leadData;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Carrier Setup Lead: ' . ($this->leadData['full_name'] ?? 'New Driver') . ' (' . ($this->leadData['equipment_type'] ?? 'Fleet') . ')',
            replyTo: [$this->leadData['email']],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.carrier-lead',
        );
    }
}