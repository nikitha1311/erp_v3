<?php

namespace App\Http\Controllers\Fleetomata\VendorLedgers;

use App\Domain\Orders\Models\Order;
use App\Domain\Trips\Models\Trip;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Notification;
use App\Domain\VendorLedgers\Actions\CreateVendorLedgerAction;
use App\Domain\VendorLedgers\Models\VendorLedger;
use App\Domain\VendorLedgers\Requests\CreateVendorLedgerRequest;
use Illuminate\Support\Facades\DB;

class TripIncomeController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(CreateVendorLedgerRequest $request,Trip $trip)
    {
        $order = Order::findOrFail($request->ledgerable_id);
        if (!$trip->orders()->find($order->id)->exists()){
            Notification::error('Order not present in trip!');
            return redirect()->back();
        }
        $createVendorLedgerAction = new CreateVendorLedgerAction($request->ledgerable_id,$request->amount,$request->payment_mode,
                $request->payment_towards,$request->date,$request->bank_account_id,$request->remarks);
        $vendor_ledger = $createVendorLedgerAction->handle($order);
        $this->updateBalances($order, $request);
        Notification::success('Income noted successfully!');
        return redirect()->back();
    }

  
   private function updateBalances($order, $request)
   {
       $order->decrement('outstanding', $request->amount);
       $order->vendor->syncOutstanding();
       $order->trip->updateCollection();
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


    public function destroy(Trip $trip, VendorLedger $income, Request $request)
    {   
        DB::transaction(function () use ($trip, $income) {
            $order = Order::findOrFail($income->ledgerable_id);
            $income->delete();
            $order->updateOutstanding();
            $order->trip->updateCollection();
            $order->vendor->syncOutstanding();
        });
        Notification::success('Deleted note successfully!');
        return redirect()->back();
    }
}
