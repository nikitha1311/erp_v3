<?php

namespace App\Domain\Vendors\Models;

use App\Domain\LHAs\Models\LoadingHireAgreement;
use App\Domain\VendorLedgers\Models\VendorLedger;
use App\Traits\CreatedBy;
use App\Domain\Orders\Models\Order;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Vendor extends Model implements AuditableContract
{
    use CreatedBy,Auditable;

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

    public function ledgers()
    {
        return $this->hasMany(VendorLedger::class);
    }

    public function income()
    {
        return $this->ledgers()->where('ledgerable_type','App\Domain\Orders\Models\Order');
    }

    public function loadingHireAgreement()
    {
        return $this->hasMany(LoadingHireAgreement::class,'vendor_id');
    }


}
