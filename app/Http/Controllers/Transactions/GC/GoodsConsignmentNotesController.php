<?php

namespace App\Http\Controllers\Transactions\GC;

use App\Domain\GCs\Models\GoodsConsignmentNote;
use App\Domain\GCs\Requests\CreateGCRequest;
use App\Domain\GCs\Requests\UpdateGCRequest;
use App\Domain\Transactions\Models\Transaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GoodsConsignmentNotesController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        $transaction = Transaction::find(request('t_id'));
        return view('transactions.gc.create', [
            'transaction' => $transaction
        ]);
    }


    public function store(CreateGCRequest $request)
    {
        try {
            $gc = $request->handle();
            if (request('transaction_id') != null) {
                $transaction = Transaction::find(request('transaction_id'))->addGC($gc->id);
                return redirect("transactions/{$transaction->id}")->withNotification([
                    'type' => 'success',
                    'msg' => 'GC created successfully',
                ]);
            }
            return redirect()->back()->withNotification([
                'type' => 'success',
                'msg' => 'GC created successfully',
            ]);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }


    public function show($id)
    {
        //
    }


    public function edit(GoodsConsignmentNote $goods_consignment_note)
    {
        return view('transactions.gc.edit')
            ->with([
                'gc' => $goods_consignment_note
                ]);
    }


    public function update(UpdateGCRequest $request,GoodsConsignmentNote $goods_consignment_note)
    {
        $notification = [];
        try {
            $request->handle($goods_consignment_note);
            if ($goods_consignment_note->isApproved())
                $goods_consignment_note->disapprove();
            $notification['type'] = 'success';
            $notification['msg'] = 'GC Edited Successfully';
        } catch (\Exception $e) {
            throw $e;
            $notification['type'] = 'error';
            $notification['msg'] = 'Unable to edit GC';
        }
        return redirect()->back()->with([
            'notification' => $notification
        ]);

    }


    public function destroy(GoodsConsignmentNote $goods_consignment_note)
    {
        if ($goods_consignment_note->trashed()) {
            $goods_consignment_note->restore();
            if ($goods_consignment_note->isApproved())
                $goods_consignment_note->disapprove();
        } else
            $goods_consignment_note->delete();
        return back()->withNotification([
            'type' => 'success',
            'msg' => 'GC Updated Successfully'
        ]);
    }
}
