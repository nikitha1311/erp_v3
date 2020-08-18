<?php

namespace App\Http\Controllers\Invoices;

use App\Domain\PaymentInvoices\Models\PaymentAdvice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentAdvicesController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return view("invoices.paymentAdvices.create");
    }


    public function store(Request $request)
    {
        $payment = PaymentAdvice::create([
            'amount' => $request->amount,
            'date' => formatDMY($request->date),
            'payment_mode' => $request->payment_mode,
            'customer_id' => $request->customer_id,
            'reference_number' => $request->reference_number,
            'remarks' => $request->remarks,
            'created_by' => auth()->id(),
        ]);
        return redirect("invoices/payment-advices/{$payment->id}");
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
