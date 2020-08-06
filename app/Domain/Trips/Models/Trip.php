<?php

namespace App\Domain\Trips\Models;

use App\Domain\Orders\Models\Order;
use App\Domain\Truck\Models\Truck;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CreatedBy;
use App\Traits\HasTruckLedgers;

class Trip extends Model
{
    use CreatedBy,HasTruckLedgers;

    protected $guarded = ['id'];

    protected $dates = [
        'when', 'accounting_date', 'completed_at'
    ];
    public function id()
    {
        return "TRP#" . $this->id;
    }

    public function days()
    {
        return optional($this->when)->diffInDays($this->completed_at ?? now()->addDay());
    }

    public function isActive()
    {
        return $this->completed_at ? false : true;
    }

    public function truck()
    {
        return $this->belongsTo(Truck::class);
    }
    public function info()
    {
        if (!$this->relationLoaded('orders'))
            $order = $this->orders()->orderByDesc('hire')->first();
        else
            $order = $this->orders->sortByDesc('hire')->first();
        if (!$order)
            return "No order";
        return $order->info();
    }
    public function updateBilling()
    {
        return $this->update([
            'billing' => $this->orders()->sum('hire'),
        ]);
    }
    public function updateCollection()
    {
        return $this->update([
            'collection' => $this->billing - ($this->orders()->sum('outstanding'))
        ]);
    }
    public function outstanding()
    {
        return $this->billing - $this->collection;
    }


    public function orders()
    {
        return $this->hasMany(Order::class);
    }

     /*
     * Total Kms = Order Kms - Part load Kms.
     */
    public function getKmsAttribute()
    {
        return $this->orders->sum('kms') - $this->orders->where('type', 1)->sum('kms');
    }



}
