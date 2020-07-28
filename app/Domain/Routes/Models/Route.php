<?php

namespace App\Domain\Routes\Models;
use App\Domain\Locations\Models\Location;
use App\Domain\TruckType\Models\TruckType;
use App\Traits\CreatedBy;
use App\Domain\BillingRates\Models\BillingRate;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use CreatedBy;

    protected $table = 'routes';

    protected $guarded = ['id'];

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    public function from()
    {
        return $this->hasOne(Location::class,'id','from_id');
    }

    public function to()
    {
        return $this->hasOne(Location::class,'id','to_id');
    }

    public function truckType()
    {
        return $this->hasOne(TruckType::class,'id','truck_type_id');
    }

    public function billingRates()
    {
        return $this->hasMany(BillingRate::class);
    }

    // public static function getIsactiveAttribute($num)
    // {
    //     switch($num)
    //     {
    //         case '1' : return 'Active';
    //         default : return 'InActive';
    //     }
    // }

}
