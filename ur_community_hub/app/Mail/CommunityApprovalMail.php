<?php

namespace App\Mail;

use App\Models\CommunityRegistrationRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommunityApprovalMail extends Mailable
{
    use Queueable, SerializesModels;

    public $registrationRequest;

    /**
     * Create a new message instance.
     */
    public function __construct(CommunityRegistrationRequest $registrationRequest)
    {
        $this->registrationRequest = $registrationRequest;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Your Community Registration is Approved!')
                    ->view('emails.community-approval')
                    ->with([
                        'userName' => $this->registrationRequest->name,
                        'communityName' => $this->registrationRequest->community_name,
                    ]);
    }
}
