<?php

namespace App\Domain\VendorLedgers\Models;

use App\Domain\Vendors\Models\Vendor;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CreatedBy;
use App\Traits\HasApprovals;

class VendorLedger extends Model
{
    use CreatedBy, HasApprovals;

    protected $guarded=['id'];
    protected $dates = ['date'];

    public function id()
    {
        return "LED#".$this->id;
    }

    public function ledgers()
    {
        return $this->morphTo();
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
    public function type()
    {
        return $this->payment_type == 0 ? 'Paid' : 'Received';
    }

    public function scopeIncome($query)
    {
        return $query->where('payment_type',1);
    }

    public function isCreditable()
    {
        return (bool)$this->payment_type == 0;
    }

    public function isDebitable()
    {
        return !$this->isCreditable();
    }

    public function status()
    {
        if($this->approvalStatus())
            return "Approved by : ".$this->approval->approvedBy->name;
        return "Not Approved";
    }

    public function updateAmount()
    {
        $this->amount = abs($this->amount);
        $this->isCreditable() ?: $this->amount = $this->amount * -1;
        $this->save();
        return $this;
    }

}
