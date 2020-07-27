<?php

namespace App\Domain\Vendors\Models;
use App\Traits\CreatedBy;
use App\Domain\Orders\Models\Order;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use CreatedBy;

    protected $guarded = ['id'];


    public function orders()
    {
        return $this->hasMany(Order::class,'vendor_id','id');
    }
}
