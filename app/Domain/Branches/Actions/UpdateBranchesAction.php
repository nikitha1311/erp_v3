<?php

namespace App\Domain\Branches\Actions;


use App\Domain\Branches\Models\Branch;

class UpdateBranchesAction
{
    private $name;
    private $address;


    public function __construct($name, $address)
    {
        $this->name = $name;
        $this->address = $address;

    }

    public function handle ($branch)
    {
         $branch->update([
            'name' => $this->name,
            'address' => $this->address,

        ]);
         return $branch;
    }
}
