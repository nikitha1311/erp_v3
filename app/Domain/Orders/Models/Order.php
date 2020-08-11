<?php

namespace App\Domain\Orders\Models;

use App\Domain\Trips\Models\Trip;
use App\Domain\Vendors\Models\Vendor;
use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Order extends Model implements AuditableContract
{
    use CreatedBy,Auditable;

    protected $guarded = ['id'];

    public $dates = [
        'loading_reported', 'loading_released', 'unloading_reported', 'unloading_released', 'pod_received_date', 'expected_delivery',
        'actual_delivery', 'budget_transferred_at'
    ];

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

    public function podStatus()
    {
        return $this->pod_received_date ? 'Received at ' . $this->pod_received_date->format('d-m-Y') : 'Not Received';
    }
    
    public function updateOutstanding()
    {
        return $this->update([
            'outstanding' => $this->hire - ($this->income->sum('amount')),
        ]);
    }
    
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function income()
    {
        return $this->vendor->income()
            ->where('ledgerable_id', $this->id)
            ->where('ledgerable_type', get_class($this));
    }

}
