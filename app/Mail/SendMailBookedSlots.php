<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailBookedSlots extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

     private $mailData;
     private $pdfPath;

     public function __construct($mailData,$pdfPath)
     {
         $this->mailData = $mailData;
         $this->pdfPath  = $pdfPath;
     }
 
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Appointment Slot is Successfully Booked',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.booking_template',
            with: [
                'BookingDetails' => $this->mailData,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */public function attachments(): array
{
    $filePath = $this->pdfPath;
    
    \Log::info('Attempting to access file at path:', ['path' => $filePath]);
    
    // Check if the file exists
    if (!file_exists($filePath)) {
        \Log::error('File does not exist at path:', ['path' => $filePath]);
        // Handle the error appropriately, e.g., throw an exception or skip attachment
        throw new \Exception('File not found.');
    }
    
    return [
        Attachment::fromPath($filePath)
            ->as('invoice.pdf') // Name of the file as it will appear in the email
            ->withMime('application/pdf'), // MIME type for PDF
    ];
}
}
