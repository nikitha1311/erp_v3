<?php

namespace App\Domain\LHAs\Actions;


use App\Domain\LHAs\Models\LoadingHireAgreement;
use Carbon\Carbon;
use App\Domain\Constant;

class UpdateLHAAction
{
    private $branch_id;
    private $number;
    private $from_id;
    private $to_id;
    private $truck_type_id;
    private $vendor_id;
    private $truck_number;
    private $hire;
    private $date;
    private $expected_delivery_date;
    private $type;

    public function __construct($branch_id,$number,$from_id,$to_id,$truck_type_id,
                                $vendor_id,$truck_number,$hire,$date,$expected_delivery_date,$type)
    {
        $this->branch_id = $branch_id;
        $this->number = $number;
        $this->from_id = $from_id;
        $this->to_id = $to_id;
        $this->truck_type_id = $truck_type_id;
        $this->vendor_id = $vendor_id;
        $this->truck_number = $truck_number;
        $this->hire = $hire;
        $this->date = Carbon::createFromFormat('d-m-Y', $date);
        $this->expected_delivery_date = Carbon::createFromFormat('d-m-Y', $expected_delivery_date);
        $this->type = $type;

    }

    public function handle($lha)
    {
        // dd($this);
        $lha->update([
            'branch_id' => $this->branch_id ,
            // 'number' =>$this->number->has('autogenerate') ? Constant::LHANumber() : strtoupper($this->number),
            'number' =>strtoupper($this->number),
            'from_id' => $this->from_id,
            'to_id' => $this->to_id,
            'truck_type_id' => $this->truck_type_id,
            'vendor_id' => $this->vendor_id,
            'truck_number' => strtoupper($this->truck_number),
            'hire' => $this->hire,
            'date' => $this->date,
            'expected_delivery_date' => $this->expected_delivery_date,
            'type' => $this->type,
            'created_by' => auth()->user()->id,
        ]);

        return $lha;
    }
}
