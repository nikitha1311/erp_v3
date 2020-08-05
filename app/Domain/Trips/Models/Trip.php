<?php

namespace App\Domain\Trips\Models;

use App\Domain\Orders\Models\Order;
use App\Domain\Truck\Models\Truck;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
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
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
