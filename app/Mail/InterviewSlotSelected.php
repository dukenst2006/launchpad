<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\InterviewSlot;
use App\Models\Applicant;

class InterviewSlotSelected extends Mailable
{
    use Queueable, SerializesModels;
    
    protected $applicant;
    protected $interview;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Applicant $applicant, InterviewSlot $interview)
    {
        $this->applicant = $applicant;
        $this->interview = $interview;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('team@launchpadcs.org')
                ->view('emails.interviewslot')
                ->with([
                    'applicant' => $this->applicant,
                    'interview' => $this->interview,
                ]);
    }
}
