<?php

namespace App\Http\Controllers\Transactions\GC;

use App\Domain\GCs\Actions\CreateGCAction;
use App\Domain\GCs\Actions\UpdateGCAction;
use App\Domain\GCs\Models\GoodsConsignmentNote;
use App\Domain\GCs\Requests\CreateGCRequest;
use App\Domain\GCs\Requests\UpdateGCRequest;
use App\Domain\Transactions\Models\Transaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Notification;

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
//        dd($request);
        $createGcAction = new CreateGCAction($request->number, $request->branch_id,
            $request->date, $request->consignor_id, $request->consignee_id,
            $request->bill_on_id,$request->desc,$request->invoice_number,$request->gst_number,$request->value);

        try {
            $gc = $createGcAction->handle();
            if (request('transaction_id') != null) {
                $transaction = Transaction::find(request('transaction_id'))->addGC($gc->id);
                Notification::success('GC created successfully!');
                return redirect("transactions/{$transaction->id}");
            }
            Notification::success('GC created successfully!');

            return redirect()->back();
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
        $updateGcAction = new UpdateGCAction($request->number, $request->branch_id,
            $request->date, $request->consignor_id, $request->consignee_id,
            $request->bill_on_id,$request->desc,$request->invoice_number,$request->gst_number,$request->value);
        try {
            $gc=$updateGcAction->handle($goods_consignment_note);
            if ($goods_consignment_note->isApproved())
                $goods_consignment_note->disapprove();
            Notification::success('Gc updated successfully!');

        } catch (\Exception $e) {
            Notification::error('Unable to edit GC!');
            throw $e;
        }
        Notification::success('Gc updated successfully!');
        return redirect()->back();

    }


    public function destroy(GoodsConsignmentNote $goods_consignment_note)
    {
        if ($goods_consignment_note->trashed()) {
            $goods_consignment_note->restore();
            if ($goods_consignment_note->isApproved())
                $goods_consignment_note->disapprove();
        } else
            $goods_consignment_note->delete();

         Notification::success('GC Deleted Successfully!');
        return redirect()->back();
    }
}
