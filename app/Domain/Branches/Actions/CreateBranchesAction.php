<?php

namespace App\Domain\Branches\Actions;


use App\Domain\Branches\Models\Branch;

class CreateBranchesAction
{
    private $name;
    private $address;


    public function __construct($name, $address)
    {
        $this->name = $name;
        $this->address = $address;

    }

    public function handle()
    {
        return Branch::create([
            'name' => $this->name,
            'address' => $this->address,

        ]);
    }
}
