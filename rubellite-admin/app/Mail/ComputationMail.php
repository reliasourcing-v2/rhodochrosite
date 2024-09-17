<?php

namespace App\Mail;

use App\Models\Computation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ComputationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $computation;

    /**
     * Create a new message instance.
     */
    public function __construct(Computation $computation)
    {
        $this->computation = $computation;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Reliasourcing: Email Computation!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.computation',
            with: [
                'email' => $this->computation->email,
                'pdf' => $this->computation->formatted_pdf_url,
                
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
