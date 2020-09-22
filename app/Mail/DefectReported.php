<?php

namespace App\Mail;

use App\Defect;
use App\User;
use App\Vehicle;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DefectReported extends Mailable
{
    use Queueable, SerializesModels;

    public $vehicle;

    public $defect;

    public $user;

    /**
     * Create a new message instance.
     *
     * @param Vehicle $vehicle
     * @param Defect $defect
     * @param User $user
     */
    public function __construct(Vehicle $vehicle, Defect $defect, User $user)
    {
        $this->vehicle = $vehicle;
        $this->defect = $defect;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('alerts@checkyourcar.com.au')
            ->view('emails.defects.alert');
    }
}
