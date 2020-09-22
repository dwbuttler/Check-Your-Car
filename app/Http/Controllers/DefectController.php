<?php

namespace App\Http\Controllers;

use App\Defect;
use App\Vehicle;

class DefectController extends Controller
{
    public function search($id): array
    {
        $defectDescription = [];

        $vehicle = Vehicle::find($id);
        $defects = Defect::where([
            'make'  => $vehicle->make,
            'model' => $vehicle->model,
            'year'  => $vehicle->year
        ])->get();

        $defects->each(function ($defect) use (&$defectDescription) {
            $defectDescription[] = $defect->description;
        });

        return $defectDescription;
    }
}
