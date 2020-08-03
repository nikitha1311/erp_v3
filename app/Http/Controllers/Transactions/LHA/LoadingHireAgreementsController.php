<?php

namespace App\Http\Controllers\Transactions\LHA;

use App\Domain\LHAs\Requests\CreateLHARequest;
use App\Domain\LHAs\Requests\UpdateLHARequest;
use App\Domain\Transactions\Models\Transaction;
use App\Domain\Vendors\Models\Vendor;
use App\Domain\LHAs\Models\LoadingHireAgreement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Notification;

class LoadingHireAgreementsController extends Controller
{

    public function index()
    {
        //
    }


    public function create(Transaction $transaction)
    {
        $transaction = Transaction::find(request('t_id'));
        return view("transactions.lha.create")
            ->with([
            'transaction' => $transaction,
            'vendors' => Vendor::all()
        ]);
    }


    public function store(CreateLHARequest $request)
    {
        $notification = [];
        try {
            $lha = $request->handle();
            $notification['type'] = 'success';
            $notification['msg'] = 'LHA Created Successfully';
        } catch (\Exception $e) {
            $notification['type'] = 'error';
            $notification['msg'] = 'Unable to Create LHA';
            throw $e;
        }
        if (request('transaction_id')) {
            Transaction::find(request('transaction_id'))->addLHA($lha->id);
            return redirect("/transactions/" . request('transaction_id'))->with([
                'notification' => $notification
            ]);
        }

        return redirect("/loading-hire-agreements/{$lha->id}")->with([
            'notification' => $notification
        ]);

    }


    public function show($id)
    {
        //
    }


    public function edit(LoadingHireAgreement $loading_hire_agreement)
    {
        return view('transactions.lha.edit')->with([
            'lha' => $loading_hire_agreement,
            'vendors' => Vendor::all()
        ]);
    }


    public function update(UpdateLHARequest $request, LoadingHireAgreement $loading_hire_agreement)
    {
        $notification = [];
        try {
            $request->handle($loading_hire_agreement);
            if ($loading_hire_agreement->isApproved())
                $loading_hire_agreement->disapprove();
            $notification['type'] = 'success';
            $notification['msg'] = 'LHA Updated Successfully';
        } catch (\Exception $e) {
            $notification['type'] = 'error';
            $notification['msg'] = 'Unable to edit LHA';
            throw $e;
        }
        return redirect()->back()->with([
            'notification' => $notification
        ]);
        // Notification::success($notification);
        // return redirect()->back();
    }


    public function destroy(LoadingHireAgreement $loading_hire_agreement)
    {
        $notification = [];
        if ($loading_hire_agreement->trashed()) {
            $loading_hire_agreement->restore();
            if ($loading_hire_agreement->isApproved())
                $loading_hire_agreement->disapprove();
            $notification['type'] = 'success';
            $notification['msg'] = 'LHA Restored Successfully';
        } else {
            $loading_hire_agreement->delete();
            $notification['type'] = 'success';
            $notification['msg'] = 'LHA Deleted Successfully';
        }
        return back()->with(['notification' => $notification]);
    }
}
