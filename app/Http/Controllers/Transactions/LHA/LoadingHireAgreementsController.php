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
use App\Domain\LHAs\Actions\CreateLHAAction;
use App\Domain\LHAs\Actions\UpdateLHAAction;

class LoadingHireAgreementsController extends Controller
{

    public function index()
    {
        //
    }


    public function create(Transaction $transaction)
    {
        $transaction = Transaction::find(request('t_id'));
        return view("transactions.lha.create")->with([
            'transaction' => $transaction,
            'vendors' => Vendor::all()
        ]);
    }


    public function store(CreateLHARequest $request)
    {
        $createLhaAction = new CreateLHAAction($request->branch_id, $request->number,
        $request->from_id, $request->to_id, $request->truck_type_id,
        $request->vendor_id,$request->truck_number,$request->hire,$request->date,$request->expected_delivery_date,$request->type);
        try {
            $lha = $createLhaAction->handle();
            Notification::success('LHA created successfully!');
        } catch (\Exception $e) {
            Notification::error('Unable to create LHA!');
            throw $e;
        }
        if (request('transaction_id')) {
            Transaction::find(request('transaction_id'))->addLHA($lha->id);
            Notification::success('LHA created successfully!');
            return redirect("/transactions/" . request('transaction_id'));
        }
        Notification::success('LHA created successfully!');
        return redirect("/loading-hire-agreements/{$lha->id}");
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
        $updateLhaAction = new UpdateLHAAction($request->branch_id, $request->number,
        $request->from_id, $request->to_id, $request->truck_type_id,
        $request->vendor_id,$request->truck_number,$request->hire,$request->date,$request->expected_delivery_date,$request->type);
        try {
            $lha = $updateLhaAction->handle($loading_hire_agreement);
            if ($loading_hire_agreement->isApproved())
                $loading_hire_agreement->disapprove();
            Notification::success('LHA updated successfully!');
        } catch (\Exception $e) {
            Notification::error('Unable to edit LHA!');
            throw $e;
        }
        Notification::success('LHA updated successfully!');
        return redirect()->back();
 
    }


    public function destroy(LoadingHireAgreement $loading_hire_agreement)
    {
        if ($loading_hire_agreement->trashed()) {
            $loading_hire_agreement->restore();
            if ($loading_hire_agreement->isApproved())
                $loading_hire_agreement->disapprove();
            Notification::success('LHA Restored successfully!');
        } else {
            $loading_hire_agreement->delete();
            Notification::success('LHA Deleted successfully!');
        }
        Notification::success('LHA Deleted successfully!');
        return redirect()->back();
    }
}
