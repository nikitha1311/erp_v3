<?php

namespace App\Http\Controllers\Transactions;

use App\Domain\Transactions\Models\Transaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionsApprovalController extends Controller
{
    public function store(Transaction $transaction, Request $request)
    {
        $notification = [
            'type' => 'error',
            'msg' => 'Add a LHA / GC to Approve'
        ];
        if ($transaction->goodsConsignmentNotes()->count() > 0 || $transaction->loadingHireAgreements()->count() > 0) {
            $transaction->approve();
            $notification['type'] = 'success';
            $notification['msg'] = 'Approved successfully';
        }
        return back()->withNotification($notification);
    }
}
