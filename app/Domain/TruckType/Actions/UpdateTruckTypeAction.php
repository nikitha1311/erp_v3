<?php

namespace App\Domain\TruckType\Actions;


use App\Domain\TruckType\Models\TruckType;

class UpdateTruckTypeAction
{
    private $name;


    public function __construct($name)
    {
        $this->name = $name;
    }

    public function handle($truck_type)
    {
         $truck_type->update([
            'name' => $this->name,

        ]);
        return $truck_type;
    }
}
