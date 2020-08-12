<?php

namespace App\Domain\VendorLedgers\Actions;


use Carbon\Carbon;

class CreateVendorLedgerAction
{
    private $ledgerable_id;
    private $amount;
    private $payment_mode;
    private $date;
    private $payment_towards;
    private $bank_account_id;
    private $remarks;

    public function __construct($ledgerable_id,$amount,$payment_mode,$payment_towards,$date,$bank_account_id,$remarks)
    {
        $this->ledgerable_id = $ledgerable_id;
        $this->amount =  $amount;
        $this->payment_mode = $payment_mode;
        $this->date = $date;
        $this->payment_towards = $payment_towards;
        $this->bank_account_id = $bank_account_id;
        $this->remarks = $remarks;
    }

    public function handle($order)
    {
        return $order->income()->create([
            'ledgerable_id' => $this->ledgerable_id,
            'ledgerable_type' => get_class($order),
            'amount' => $this->amount,
            'payment_mode' => $this->payment_mode,
            'date' => Carbon::createFromFormat('d-m-Y',$this->date),
            'payment_type' => 1,
            'payment_towards' => $this->payment_towards,
            'bank_account_id' => $this->bank_account_id,
            'remarks' => $this->remarks,
            'created_by' => auth()->user()->id,
        ]);
    }
}
