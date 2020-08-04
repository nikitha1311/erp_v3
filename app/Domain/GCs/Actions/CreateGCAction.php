<?php

namespace App\Domain\GCs\Actions;


use App\Domain\GCs\Models\GoodsConsignmentNote;
use Carbon\Carbon;
use App\Domain\Constant;

class CreateGCAction
{
    private $number;
    private $branch_id;
    private $date;
    private $consignor_id;
    private $consignee_id;
    private $bill_on_id;
    private $desc;
    private $invoice_number;
    private $gst_number;
    private $value;

    public function __construct($number, $branch_id,
            $date, $consignor_id, $consignee_id,
            $bill_on_id,$desc,$invoice_number,$gst_number,$value)
    {
        $this->number = $number;
        $this->branch_id = $branch_id;
        $this->date = Carbon::createFromFormat('d-m-Y', $date);
        $this->consignor_id = $consignor_id;
        $this->consignee_id = $consignee_id;
        $this->bill_on_id = $bill_on_id;
        $this->desc = $desc;
        $this->invoice_number = $invoice_number;
        $this->gst_number = $gst_number;
        $this->value = $value;

    }

    public function handle()
    {
        // dd($this);
        return GoodsConsignmentNote::create([
            'number' =>strtoupper($this->number),
            'branch_id' => $this->branch_id ,
            'date' => $this->date,
            'consignor_id' => $this->consignor_id,
            'consignee_id' => $this->consignee_id,
            'bill_on_id' => $this->bill_on_id,
            'desc' => $this->desc,
            'invoice_number' => $this->invoice_number,
            'gst_number' => $this->gst_number,
            'value' => $this->value,
            'created_by' => auth()->user()->id,

        ]);
    }
}
