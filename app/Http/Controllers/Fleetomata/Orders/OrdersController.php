<?php

namespace App\Http\Controllers\Fleetomata\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domain\Trips\Models\Trip;
use App\Domain\Vendors\Models\Vendor;

class OrdersController extends Controller
{
    
    public function index()
    {
        //
    }

   
    public function create()
    {
        //
    }

   
    public function store(Trip $trip,Request $request)
    {
        if (!$trip->isActive()) {
            return back()->withNotification([
                'type' => 'error',
                'msg' => 'Trip isnt active'
            ]);
        }
        $params = $this->getBudgetedExpenses($trip->truck->group, $request->weight, $request->kms, $request->type);
        $trip->orders()->create([
            'from_id' => $request->from_id,
            'to_id' => $request->to_id,
            'vendor_id' => $request->vendor_id,
            'hire' => $request->hire,
            'outstanding' => $request->hire,
            'kms' => $request->kms,
            'loading_charges' => $request->loading_charges,
            'unloading_charges' => $request->unloading_charges,
            'type' => $request->type,
            'mileage' => $params['mileage'],
            'diesel_liters' => $params['diesel_liters'],
            'enroute' => $params['enroute'],
            'weight' => $request->weight,
            'material' => $request->material,
            'remarks' => $request->remarks,
            'created_by' => auth()->user()->id,
        ]);

        $trip->updateBilling();
        Vendor::findOrFail($request->vendor_id)->syncOutstanding();
        return redirect()->back()->withNotification([
            'type' => 'success',
            'msg' => 'Order created successfully'
        ]);
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

    public function destroy($id)
    {
        //
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
