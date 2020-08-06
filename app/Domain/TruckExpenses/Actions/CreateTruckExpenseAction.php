<?php

namespace App\Domain\TruckExpenses\Actions;


use App\Domain\Truck\Models\Truck;
use App\Domain\TruckExpenses\Models\TruckExpense;

class CreateTruckExpenseAction
{
    private $expense_date;
    private $type;
    private $type_description;
    private $amount;
    private $valid_till;



    public function __construct($expense_date,$type,$type_description,$amount,$valid_till)
    {
        $this->expense_date = $expense_date;
        $this->type = $type;
        $this->type_description = $type_description;
        $this->amount = $amount;
        $this->valid_till = $valid_till;

    }

    public function handle($truck)
    {
        return TruckExpense::create([
            'expense_date' => formatDMY($this->expense_date),
            'type' => $this->type,
            'type_description' => $this->type_description,
            'amount' => $this->amount,
            'valid_till' => formatDMY($this->valid_till),
            'truck_id' => $truck->id


        ]);
    }
}
