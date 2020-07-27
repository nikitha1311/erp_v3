<?php

namespace App\Domain\Orders\Models;

use App\Domain\Trips\Models\Trip;
use App\Domain\Vendors\Models\Vendor;
use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use CreatedBy;


    public function id()
    {
        return "ORD#" . $this->id;
    }

    public function info()
    {
        return $this->from . " - " . $this->to;
    }
    public function vendor()
    {
        return $this->hasOne(Vendor::class, 'id', 'vendor_id');
    }

}
