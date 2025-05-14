<?php

namespace App\Mail;

use App\Models\MemberRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MemberRequestRejected extends Mailable
{
    use Queueable, SerializesModels;

    public $memberRequest;

    public function __construct(MemberRequest $memberRequest)
    {
        $this->memberRequest = $memberRequest;
    }

    public function build()
    {
        return $this->subject('Your Membership Request Has Been Rejected')
                    ->view('emails.member-request-rejected');
    }
}
