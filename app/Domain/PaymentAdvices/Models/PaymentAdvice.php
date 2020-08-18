<?php

namespace App\Domain\PaymentInvoices\Models;

use App\Domain\Customers\Models\Customer;
use App\Domain\Invoices\Models\InvoiceCredit;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CreatedBy;

class PaymentAdvice extends Model
{
    use CreatedBy;

    protected $dates = ['date'];

    protected $appends = ['formattedID'];

    public function invoiceCredits()
    {
        return $this->hasMany(InvoiceCredit::class,'payment_advice_id','id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function id()
    {
        return "PA#".$this->id;
    }
}
