<?php

namespace App\Http\Controllers\Invoices;

use App\Domain\Invoices\Models\Invoice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceStatusesController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Invoice $invoice, Request $request)
    {
        $invoice->statuses()->create([
            'date' => formatDMY($request->date),
            'status' => $request->status,
            'remarks' => $request->remarks,
            'created_by' => auth()->id(),
        ]);
        return back()->withNotification([
            'type' => 'success',
            'msg' => 'Status updated successfully'
        ]);
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
