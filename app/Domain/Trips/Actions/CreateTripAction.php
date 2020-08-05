<?php

namespace App\Domain\Trips\Actions;


use App\Domain\Trips\Models\Trip;
use Carbon\Carbon;
use App\Classes\Notification;
use App\Domain\Truck\Models\Truck;

class CreateTripAction
{
   
    // private $truck_id;

    public function __construct()
    {
        // $this->truck_id = $truck_id;
    }

    public function handle($truck)
    {     
        // dd($truck);
        return $truck->trips()->create([
            'created_by' => auth()->user()->id,
        ]);
    }
}
