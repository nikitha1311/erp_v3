<?php

namespace App\Domain\TruckExpenses\Actions;


use App\Domain\TruckExpenses\Models\TruckExpense;

class UpdateTruckExpenseAction
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
