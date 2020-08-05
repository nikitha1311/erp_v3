<?php

namespace App\Http\Controllers\Fleetomata\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domain\Trips\Models\Trip;
use App\Domain\Vendors\Models\Vendor;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
