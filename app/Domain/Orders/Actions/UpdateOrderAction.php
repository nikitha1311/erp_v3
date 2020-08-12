<?php

namespace App\Domain\Orders\Actions;


use Carbon\Carbon;

class UpdateOrderAction
{
    private $from_id;
    private $to_id;
    private $vendor_id;
    private $hire;
    private $kms;
    private $loading_charges;
    private $remarks;
    private $unloading_charges;
    private $type;
    private $mileage;
    private $diesel_liters;
    private $enroute;
    private $weight;
    private $material;

    public function __construct($from_id,$to_id,$vendor_id,$hire,$kms,$loading_charges,$unloading_charges,$type,$mileage,
    $diesel_liters,$enroute,$weight,$material,$remarks)
    {
        $this->from_id = $from_id;
        $this->to_id =  $to_id;
        $this->vendor_id = $vendor_id;
        $this->hire = $hire;
        $this->kms = $kms;
        $this->loading_charges = $loading_charges;
        $this->remarks = $remarks;
        $this->unloading_charges = $unloading_charges;
        $this->type = $type;
        $this->mileage = $mileage;
        $this->diesel_liters = $diesel_liters;
        $this->enroute = $enroute;
        $this->weight = $weight;
        $this->material = $material;

    }

    public function handle($trip)
    {
        return $trip->orders()->create([
            'from_id' => $this->from_id,
            'to_id' => $this->to_id,
            'vendor_id' => $this->vendor_id,
            'hire' => $this->hire,
            'outstanding' => $this->hire,
            'kms' => $this->kms,
            'loading_charges' => $this->loading_charges,
            'unloading_charges' => $this->unloading_charges,
            'type' => $this->type,
            'mileage' => $this->mileage,
            'diesel_liters' => $this->diesel_liters,
            'enroute' => $this->enroute,
            'weight' => $this->weight,
            'material' => $this->material,
            'remarks' => $this->remarks,
            'created_by' => auth()->user()->id,
        ]);
    }
}
