<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'make'      => 'required',
            'model'     => 'required',
            'year'      => 'required',
            'type'      => 'required'
        ]);

        $vehicle            = new Vehicle;
        $vehicle->make      = $validatedData['make'];
        $vehicle->model     = $validatedData['model'];
        $vehicle->year      = $validatedData['year'];
        $vehicle->type      = $validatedData['type'];
        $vehicle->user_id   = auth()->id();

        $vehicle->save();

        return redirect()->route('user.home', [auth()->id()]);
    }

    public function edit(Request $request) {
        $validatedData = $request->validate([
            'make'      => 'required',
            'model'     => 'required',
            'year'      => 'required',
            'type'      => 'required'
        ]);

        $vehicle            = Vehicle::find($request->input('vehicleID'));
        $vehicle->make      = $validatedData['make'];
        $vehicle->model     = $validatedData['model'];
        $vehicle->year      = $validatedData['year'];
        $vehicle->type      = $validatedData['type'];

        $vehicle->save();

        return redirect()->route('user.home', [auth()->id()]);
    }

    public function delete($id) {
        Vehicle::find($id)->delete();

        return response('Vehicle deleted', 200);
    }
}
