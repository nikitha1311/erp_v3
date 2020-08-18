<?php

namespace App\Domain\Invoices\Models;

use App\Domain\Transactions\Models\Transaction;
use Illuminate\Database\Eloquent\Model;

class InvoiceRow extends Model
{
    protected $guarded=['id'];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
