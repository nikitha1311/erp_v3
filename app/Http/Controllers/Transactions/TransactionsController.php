<?php

namespace App\Http\Controllers\Transactions;

use App\Domain\Customers\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Notification;
use App\Domain\Transactions\Models\Transaction;
use App\Domain\LHAs\Models\LoadingHireAgreement;
use App\Domain\GCs\Models\GoodsConsignmentNote;
use Carbon\Carbon;
use App\Domain\Transactions\Actions\CreateTransactionAction;

class TransactionsController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        $createTransactionAction = new CreateTransactionAction();
        $transaction = $createTransactionAction->handle();
        Notification::success('Transactions created successfully!');
        return redirect("/transactions/{$transaction->id}");
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

        return view('transactions.show')->with([
                'transaction' => $transaction,
            ]);
    }


    public function edit(Transaction $transaction)
    {
        return view('transactions.edit')->with([
            'transaction' => $transaction,
            'customers' => Customer::whereHas('liveContracts')->get()
        ]);
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(Transaction $transaction)
    {
        $notification = [];
        if ($transaction->trashed()) {
            $transaction->restore();
            if ($transaction->isApproved())
                $transaction->disapprove();
            $notification['type'] = 'success';
            $notification['msg'] = 'Transaction Restored Successfully';
        } else {
            $transaction->delete();
            $transaction->loadingHireAgreements()->sync([]);
            $transaction->goodsConsignmentNotes()->sync([]);
            $notification['type'] = 'success';
            $notification['msg'] = 'Transaction deleted Successfully';
        }
        return back()->with(['notification' => $notification]);
    }
}
