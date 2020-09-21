<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Vehicle extends Model
{
    protected $table = 'vehicles';

    protected $vehicleTypes = [
        'sedan'     => 'Sedan',
        'hatchback' => 'Hatchback',
        'utility'   => 'Utility',
        'van'       => 'Van',
        'truck'     => 'Truck'
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getVehicleTypes(): array
    {
        return $this->vehicleTypes;
    }
}
