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
        $usersWithDefectedVehicles = Vehicle::where([
            'make'  => $defect->make,
            'model' => $defect->model,
            'year'  => $defect->year
        ])->user();

        $usersWithDefectedVehicles->each(function ($user) use ($defect) {
            Mail::to($user)->send(
                new DefectReported($user->vehicle, $defect, $user)
            );
        });
    }
}
