<?php

namespace App\Domain\Invoices\wsp\Actions;


use App\Domain\GCs\Models\GoodsConsignmentNote;
use App\Domain\Invoices\Models\Invoice;
use Carbon\Carbon;
use App\Domain\Constant;

class UpdateWspInvoiceAction
{
    private $number;
    private $date;
    private $type;
    private $total;
    private $outstanding;
    private $customer_id;
    private $created_by;


    public function __construct($number, $date, $type, $total, $outstanding,$customer_id,$created_by)
    {
        $this->number = $number;
        $this->date = Carbon::createFromFormat('d-m-Y', $date);
        $this->type = $type;
        $this->total = $total;
        $this->outstanding = $outstanding;
        $this->customer_id = $customer_id;
        $this->created_by = $created_by;


    }

    public function handle()
    {
        // dd($this);
        return Invoice::create([
            'number' => Invoice::generateNumber(),
            'date' => $this->date,
            'type' => 2,
            'total' => $this->total,
            'outstanding' => $this->total,
            'customer_id' => $this->customer_id,
            'created_by' => auth()->id(),
        ]);

    }

}
