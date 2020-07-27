<?php

namespace App\Domain\TruckType\Actions;


use App\Domain\TruckType\Models\TruckType;

class CreateTruckTypeAction
{
    private $name;


    public function __construct($name)
    {
        $this->name = $name;
    }

    public function handle()
    {
        return TruckType::create([
            'name' => $this->name,

        ]);
    }
}
