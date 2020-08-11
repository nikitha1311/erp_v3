<?php

namespace App\Http\Controllers\Transactions;

use App\Domain\Customers\Models\Customer;
use App\Domain\Transactions\Actions\UpdateTransactionAction;
use App\Domain\Transactions\Requests\UpdateTransactionRequest;
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
        $audits = $transaction->audits;

        $transaction = $transaction->load('route.from', 'route.to', 'route.truckType',
            'loadingHireAgreements.from','loadingHireAgreements.to','loadingHireAgreements.truckType',
            'loadingHireAgreements.branch','loadingHireAgreements.createdBy','loadingHireAgreements.vendor',
            'goodsConsignmentNotes.consignor','goodsConsignmentNotes.consignee','goodsConsignmentNotes.billedOn',
            'goodsConsignmentNotes.approval',
            'approval'
            );

        return view('transactions.show')->with([
                'transaction' => $transaction,
                'audits' => $audits
            ]);
    }


    public function edit(Transaction $transaction)
    {
        return view('transactions.edit')->with([
            'transaction' => $transaction,
            'customers' => Customer::whereHas('liveContracts')->get()
        ]);
    }


    public function update(UpdateTransactionRequest $request,Transaction $transaction)
    {
//        dd($request);
        if ($transaction->customer_id != $request->customer_id || $transaction->route_id != $request->route_id)
            $request->billing_id = null;
        else
            $request->billing_id = $transaction->billing_id;

        $updateTransactionAction = new UpdateTransactionAction($request->route_id, $request->customer_id,
            $request->date, $request->billing_id);
        $transaction = $updateTransactionAction->handle($transaction);
//        $transaction->update([
//            'route_id' => $request->route_id,
//            'customer_id' => $request->customer_id,
//            'date' => formatDMY($request->date),
//            'billing_id' => $request->billing_id,
//            'created_by' => auth()->id()
////        ]);
//        $transaction->updateTotal();
//
        if ($transaction->isApproved())
            $transaction->disapprove();

        return redirect("/transactions/{$transaction->id}")->withNotification([
            'type' => 'success',
            'msg' => 'Transaction updated successfully'
        ]);
    }



    public function destroy(Transaction $transaction)
    {
//        $notification = [];
        if ($transaction->trashed()) {
            $transaction->restore();
            if ($transaction->isApproved())
                $transaction->disapprove();
            Notification::success('Transaction Restore successfully!');

        } else {
            $transaction->delete();
            $transaction->loadingHireAgreements()->sync([]);
            $transaction->goodsConsignmentNotes()->sync([]);
//            $notification['type'] = 'success';
//            $notification['msg'] = 'Transaction deleted Successfully';
        }
        Notification::success('Transaction Deleted successfully!');
        return redirect()->back();
//        ->with(['notification' => $notification]);
    }
}
