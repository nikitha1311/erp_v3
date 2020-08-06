<?php

namespace App\Domain\Orders\Models;

use App\Domain\Trips\Models\Trip;
use App\Domain\Vendors\Models\Vendor;
use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{
    use CreatedBy;

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

}
