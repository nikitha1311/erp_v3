<?php

namespace App\Domain\Vendors\Models;
use App\Domain\VendorLedgers\Models\VendorLedger;
use App\Traits\CreatedBy;
use App\Domain\Orders\Models\Order;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use CreatedBy;

    protected $guarded = ['id'];

    public function syncOutstanding()
    {
        return $this->update([
            'current_outstanding' => $this->orders()->where('outstanding','>',0)->sum('outstanding')
        ]);
    }

    public function orders()
    {
        return $this->hasMany(Order::class,'vendor_id','id');
    }
    public function income()
    {
        return $this->ledgers()->where('ledgerable_type','App\Models\Fleetomata\Order');
    }
    public function ledgers()
    {
        return $this->hasMany(VendorLedger::class);
    }

}
