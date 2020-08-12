<?php

namespace App\Domain\Transactions\Actions;


use App\Domain\Transactions\Models\Transaction;
use Carbon\Carbon;

class UpdateTransactionAction
{
    private $customer_id;
    private $route_id;
    private $date;
    private $billing_id;


    public function __construct($customer_id, $route_id, $date,$billing_id)
    {
        $this->customer_id =$customer_id;
        $this->route_id = $route_id;
        $this->date =  Carbon::createFromFormat('d-m-Y', $date);
        $this->billing_id = $billing_id;

    }

    public function handle($transaction)
    {
//        dd($this);
        $transaction->update([
            'customer_id' => $this->customer_id,
            'route_id' => $this->route_id,
            'date' => $this->date,
            'billing_id' => $this->billing_id,
            'created_by' => auth()->user()->id
        ]);
        return $transaction;
    }
}
