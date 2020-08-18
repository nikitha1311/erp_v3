<?php

namespace App\Domain\Invoices\Models;

use App\Domain\Transactions\Models\Transaction;

class InvoiceRowAdder
{

    private $transaction;
    private $invoice;

    public function __construct($transaction_id, $invoice)
    {
        $this->transaction = Transaction::findOrFail($transaction_id);
        $this->invoice = $invoice;
    }

    public function handle()
    {
        if ($this->invoiceSubmitted())
            return response('Invoice is submitted');
        if (!$this->transaction->lha_id)
            return response('No LHA');
        if ($this->transaction->isNotApproved())
            return response('Transaction is not Approved');
        if ($this->invoice->rows()->where('transaction_id', $this->transaction->id)->exists())
            return response('Transaction Exists');
        if(is_null($this->transaction->billing_id))
            return response('Billing Rate not updated');
        if ($this->transaction->customer_id == $this->invoice->customer_id) {
            $this->createRow();
            $this->transaction->update([
                'invoice_id' => $this->invoice->id,
            ]);
        }
        return response('Added', 200);
    }

    protected function invoiceSubmitted()
    {
        return (optional($this->invoice->status())->status == 1);
    }

    protected function createRow()
    {
        $this->invoice->rows()->create([
            'transaction_id' => $this->transaction->id,
        ]);
        $this->invoice->updateTotal();
        $this->invoice->updateOutstanding();
    }

}
