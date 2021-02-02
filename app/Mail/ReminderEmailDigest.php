<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Equipment;

class ReminderEmailDigest extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    
    private $equipment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($equipment)
    {
        $this->equipment = $equipment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.reminder-digest')
        ->from('waterproof@mail.com')
        ->with('equipment', $this->equipment);
    }
}
