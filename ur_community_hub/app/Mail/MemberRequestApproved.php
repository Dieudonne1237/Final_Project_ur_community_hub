<?php

namespace App\Mail;

use App\Models\MemberRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MemberRequestApproved extends Mailable
{
    use Queueable, SerializesModels;

    public $memberRequest;

    public function __construct(MemberRequest $memberRequest)
    {
        $this->memberRequest = $memberRequest;
    }

    public function build()
    {
        return $this->subject('Your Membership Request Has Been Approved')
                    ->view('emails.member-request-approved');
    }
}
