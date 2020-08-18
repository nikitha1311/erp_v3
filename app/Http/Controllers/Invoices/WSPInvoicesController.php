<?php

namespace App\Http\Controllers\Invoices;

use App\Domain\Customers\Models\Customer;
use App\Domain\Invoices\Actions\CreateInvoiceAction;
use App\Domain\Invoices\Models\Invoice;
use App\Domain\Invoices\wsp\Actions\CreateWspInvoiceAction;
use App\Domain\Invoices\wsp\Requests\CreateWspInvoiceRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Notification;

class WSPInvoicesController extends Controller
{

    public function index()
    {
//        $invoice=Invoice::all();
        $invoice = Invoice::where('type', '2')->get();

        return view("invoices.index")->with([
            'invoices'=>$invoice->load('customer')
        ]);
    }


    public function create()
    {
        return view("invoices.wsp.create");
    }


    public function store(CreateWspInvoiceRequest $request)
    {
        $createwspInvoiceAction = new CreateWspInvoiceAction($request->number, $request->date, $request->type, $request->total, $request->outstanding,$request->customer_id,$request->created_by);
        $invoice = $createwspInvoiceAction->handle();
        Notification::success('Wsp-Invoice created successfully!');
        return redirect("wsp-invoices");
    }


    public function show($id)
    {
        //
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
