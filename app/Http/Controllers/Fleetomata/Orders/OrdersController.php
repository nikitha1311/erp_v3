<?php

namespace App\Http\Controllers\Fleetomata\Orders;

use App\Classes\Notification;
use App\Domain\Orders\Actions\CreateOrderAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domain\Trips\Models\Trip;
use App\Domain\Vendors\Models\Vendor;
use App\Domain\Orders\Models\Order;
use Illuminate\Support\Facades\DB;
class OrdersController extends Controller
{
    
    public function index()
    {
       
    }

   
    public function create()
    {
        //
    }

   
    public function store(Trip $trip,Request $request)
    {
        if (!$trip->isActive()) {
            Notification::error('Trip isnt active');
            return back();
        }
       
        $params = $this->getBudgetedExpenses($trip->truck->group, $request->weight, $request->kms, $request->type);

        $createOrderAction = new CreateOrderAction($request->from_id,$request->to_id,$request->vendor_id,$request->hire,
        $request->kms,$request->loading_charges,$request->unloading_charges,$request->type,$params['mileage'],
        $params['diesel_liters'],$params['enroute'],$request->weight,$request->material,$request->remarks);

        $order = $createOrderAction->handle($trip);
        $trip->updateBilling();
        Vendor::findOrFail($request->vendor_id)->syncOutstanding();

        Notification::success('Order Created Successfully');
        return redirect("/fleetomata/trips/{$trip->id}");       
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

    public function destroy(Trip $trip, Order $order, Request $request)
    {
        
        DB::transaction(function () use ($trip, $order) {
            $vendor = $order->vendor;
            $order->delete();
            $vendor->syncOutstanding();
            $trip->updateBilling();
        });
        return redirect()->back();
    }

    protected function getBudgetedExpenses($group, $weight, $kms, $type)
    {
        $mileage = getBaseMileage($group, $weight);
        $liters = round($kms / $mileage,2);
        switch ($type) {
            case 0 :
                //FTL
                return [
                    'mileage' => $mileage,
                    'diesel_liters' => $liters,
                    'enroute' => getEnroutePerKm($group) * $kms,
                ];
            case 1 :
                //PTL
                return [
                    'mileage' => $mileage,
                    'diesel_liters' => 0,
                    'enroute' => 0,
                ];
            case 2 :
                return [
                    'mileage' => $mileage,
                    'diesel_liters' => $liters,
                    'enroute' => 0,
                ];
            //Empty
        }
    }
}
