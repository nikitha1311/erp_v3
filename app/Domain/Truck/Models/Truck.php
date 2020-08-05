<?php

namespace App\Domain\Truck\Models;

use App\Domain\Trips\Models\Trip;
use App\Domain\TruckType\Models\TruckType;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    protected $guarded=['id'];

    protected $dates = ['last_seen'];

    public function activeTrip()
    {
        return $this->hasOne(Trip::class, 'id', 'trip_id')->withDefault();
    }
    public function trips()
    {
        return $this->hasMany(Trip::class)->latest();
    }
    public function type()
    {
        return $this->hasOne(TruckType::class, 'id', 'truck_type_id');
    }

}
