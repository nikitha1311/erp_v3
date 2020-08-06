<?php

namespace App\Http\Controllers\Fleetomata\VendorLedgers;

use App\Domain\Orders\Models\Order;
use App\Domain\Trips\Models\Trip;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Notification;

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


    public function store(Trip $trip, Request $request)
    {
        $order = Order::findOrFail($request->ledgerable_id);
        if (!$trip->orders()->find($order->id)->exists())
            return redirect()->back()->withNotification([
                'type' => 'error',
                'msg' => 'Order not present in trip'
            ]);
//        if ($order->outstanding < $request->amount)
//            return redirect()->back()->withNotification([
//                'type' => 'error',
//                'msg' => 'Order outstanding less than amount'
//            ]);
        $this->createIncome($request, $order);
//        $this->updateBalances($order, $request);

        return redirect()->back()->withNotification([
            'type' => 'success',
            'msg' => 'Income noted'
        ]);
    }

    private function createIncome(Request $request, $order)
    {
        return $order->income()->create([
            'ledgerable_id' => $request->ledgerable_id,
            'ledgerable_type' => get_class($order),
            'amount' => $request->amount,
            'payment_type' => 1,
            'payment_mode' => $request->payment_mode,
            'payment_towards' => $request->payment_towards,
            'date' => formatDMY($request->date),
            'bank_account_id' => $request->bank_account_id,
            'remarks' => $request->remarks,
            'created_by' => auth()->id()
        ]);
    }

//    private function updateBalances($order, $request)
//    {
//        $order->decrement('outstanding', $request->amount);
//        $order->vendor->syncOutstanding();
//        $order->trip->updateCollection();
//    }


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
