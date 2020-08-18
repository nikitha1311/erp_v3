<?php

namespace App\Http\Controllers\Invoices;

use App\Domain\Invoices\Actions\CreateInvoiceAction;
use App\Domain\Invoices\Models\Invoice;
use App\Domain\Invoices\Requests\CreateInvoiceRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Notification;


class InvoicesController extends Controller
{

    public function index()
    {
        $invoice = Invoice::where('type', '1')->get();
//       $invoice=Invoice::all();
//    dd($invoice);
        return view("invoices.index")->with([
            'invoices'=>$invoice->load('customer')
        ]);
    }


    public function create()
    {

        return view('invoices.create');
    }


    public function store(CreateInvoiceRequest $request)
    {
        $createInvoiceAction = new CreateInvoiceAction($request->number, $request->date, $request->type, $request->total, $request->outstanding,$request->customer_id,$request->created_by);
        $invoice = $createInvoiceAction->handle();
        Notification::success('Invoice created successfully!');
        return redirect("invoices");
    }


    public function show(Invoice $invoice)
    {
        return view("invoices.show")->with([
            'invoice' => $invoice->load( 'statuses.createdBy', 'createdBy', 'rows.transaction.route.from',
                'rows.transaction.route.to', 'rows.transaction.route.truckType', 'rows.transaction.billingRate',
                'rows.transaction.loadingHireAgreements', 'rows.transaction.goodsConsignmentNotes', 'rows.transaction.defaultLHA'
            ),
        ]);
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
