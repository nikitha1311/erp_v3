<?php

namespace App\Domain\Truck\Actions;


use App\Domain\Truck\Models\Truck;
use Carbon\Carbon;

class UpdateTruckAction
{
    private $number;
    private $truck_type_id;
    private $group;

    public function __construct($number,$truck_type_id,$group)
    {
        $this->number = $number;
        $this->truck_type_id =  $truck_type_id;
        $this->group = $group;
    }

    public function handle($truck)
    {
        $truck->update([
            'number' => $this->number,
            'truck_type_id' => $this->truck_type_id,
            'group' => $this->group,
        ]);

        return $truck;
    }
}
