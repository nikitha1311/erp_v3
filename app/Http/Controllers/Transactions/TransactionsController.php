<?php

namespace App\Http\Controllers\Transactions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Notification;
use App\Domain\Transactions\Models\Transaction;
use App\Domain\LHAs\Models\LoadingHireAgreement;
use App\Domain\GCs\Models\GoodsConsignmentNote;
use Carbon\Carbon;


class TransactionsController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        $transaction = Transaction::create([
            'date' => Carbon::now(),
            'created_by' => auth()->user()->id
        ]);

        return redirect("/transactions/{$transaction->id}");
        Notification::success('Transactions created successfully!');
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Transaction $transaction)
    {
//        dd($transaction->load('loadingHireAgreements.from'));
        $transaction = $transaction->load('route.from', 'route.to', 'route.truckType',
            'loadingHireAgreements.from','loadingHireAgreements.to','loadingHireAgreements.truckType',
            'loadingHireAgreements.branch','loadingHireAgreements.createdBy','loadingHireAgreements.vendor',
            'goodsConsignmentNotes.consignor','goodsConsignmentNotes.consignee','goodsConsignmentNotes.billedOn',
            'goodsConsignmentNotes.approval',
            'approval'
            );
        return view('transactions.show')
            ->with([
                'transaction' => $transaction,
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
