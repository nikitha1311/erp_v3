<?php

namespace App\Domain\TruckLedgers\Actions;


use Carbon\Carbon;

class CreateTruckLedgerAction
{
    private $truck_id;
    private $when;
    private $type;
    private $amount;
    private $remarks;

    public function __construct($truck_id,$when,$type,$amount,$remarks)
    {
        $this->truck_id = $truck_id;
        $this->when =  $when;
        $this->type = $type;
        $this->amount = $amount;
        $this->remarks = $remarks;
    }

    public function handle($trip)
    {
        return $trip->ledgers()->create([
            'truck_id' => $this->truck_id,
            'when' => Carbon::createFromFormat('d-m-Y',$this->when),
            'type' => $this->type,
            'amount' => $this->amount,
            'remarks' => $this->remarks,
            'created_by' => auth()->user()->id,
        ]);
    }
}
