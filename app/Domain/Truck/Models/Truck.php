<?php

namespace App\Domain\Truck\Models;

use App\Domain\Trips\Models\Trip;
use App\Domain\TruckExpenses\Models\TruckExpense;
use App\Domain\TruckLedgers\Models\TruckLedger;
use App\Domain\TruckType\Models\TruckType;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;


class Truck extends Model implements AuditableContract
{
    use Auditable;

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
    public function truckExpenses()
    {
        return $this->hasMany(TruckExpense::class);
    }


    public function ledgers()
    {
        return $this->hasMany(TruckLedger::class);
    }

}
