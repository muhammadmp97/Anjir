<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookDownloadLink extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $downloadLink;

    public function __construct()
    {
        $this->downloadLink = 'https://example.com/download-link'; // TODO
    }

    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
            ->subject('لینک دریافت کتاب')
            ->view('emails.download_link', ['url' => $this->downloadLink]);
    }
}
