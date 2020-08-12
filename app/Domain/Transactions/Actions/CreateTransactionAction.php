<?php

namespace App\Domain\Transactions\Actions;


use App\Domain\Transactions\Models\Transaction;
use Carbon\Carbon;

class CreateTransactionAction
{
   

    public function __construct()
    {
      

    }

    public function handle()
    {
        return Transaction::create([
            'date' => Carbon::now(),
            'created_by' => auth()->user()->id
        ]);
    }
}
