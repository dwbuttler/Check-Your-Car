<?php

namespace App\Http\Controllers;

use App\Defect;
use App\Mail\DefectReported;
use App\Vehicle;
use Illuminate\Support\Facades\Mail;

class DefectNotificationAction extends Controller
{
    public function execute(Defect $defect): void
    {
        $defectiveVehicles = Vehicle::where([
            'make'  => $defect->make,
            'model' => $defect->model,
            'year'  => $defect->year
        ])->get();

        $defectiveVehicles->each(function ($vehicle) use ($defect) {
            Mail::to($vehicle->user)->send(
                new DefectReported($vehicle, $defect, $vehicle->user)
            );
        });
    }
}
