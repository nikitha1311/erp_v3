<?php

namespace App\Http\Controllers\Invoices;

use App\Domain\Invoices\Models\InvoiceRowAdder;
use App\Domain\Invoices\Models\Invoice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceRowsController extends Controller
{

    public function index(Invoice $invoice)
    {
//        dd(1);
        if(request()->wantsJson())
            return $invoice->rows->load('transaction.defaultLHA.truckType','transaction.route.from','transaction.route.to','transaction.route.truckType',
                'transaction.goodsConsignmentNotes.consignee','transaction.goodsConsignmentNotes.consignor','transaction.goodsConsignmentNotes.billedOn'
            );
    }

    public function store(Invoice $invoice, Request $request)
    {
        return (new InvoiceRowAdder($request->transaction_id, $invoice))->handle();
    }

    public function destroy(Invoice $invoice, Invoice $invoice_row)
    {
//        dd($request);

//        if ($invoice_row) {
//            $invoice_row->delete();
//        }
        DB::transaction(function() use ($invoice_row, $invoice) {
            $invoice_row->delete();
            $invoice_row->transaction->update([
                'invoice_id' => null,
            ]);
            $invoice->updateTotal();
            $invoice->updateOutstanding();
        });
        return redirect()->back();
    }
}
