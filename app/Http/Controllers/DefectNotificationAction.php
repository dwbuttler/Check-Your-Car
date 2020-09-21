<?php

namespace App\Http\Controllers;

use App\Defect;
use App\Vehicle;

class DefectNotificationAction extends Controller
{
    public function execute(Defect $defect): void
    {
        $usersWithDefectedVehicles = Vehicle::where([
            'make'  => $defect->make,
            'model' => $defect->model,
            'year'  => $defect->year
        ])->user();

        $usersWithDefectedVehicles->each(function () {
            // send an email notification with $defect->description
        });
    }
}
