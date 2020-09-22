<?php

namespace App\Mail;

use App\Defect;
use App\Vehicle;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DefectReported extends Mailable
{
    use Queueable, SerializesModels;

    public $vehicle;

    public $defect;

    /**
     * Create a new message instance.
     *
     * @param Vehicle $vehicle
     * @param Defect $defect
     */
    public function __construct(Vehicle $vehicle, Defect $defect)
    {
        $this->vehicle = $vehicle;
        $this->defect = $defect;
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
            ->text('emails.defects.alert');
    }
}
