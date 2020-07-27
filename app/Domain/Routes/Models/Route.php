<?php

namespace App\Domain\Routes\Models;
use App\Domain\Locations\Models\Location;
use App\Domain\TruckType\Models\TruckType;
use App\Traits\CreatedBy;

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

    public static function getIsactiveAttribute($num)
    {
        switch($num)
        {
            case '0' : return 'Inactive';
            case '1' : return 'Active';
        }
    }

}
