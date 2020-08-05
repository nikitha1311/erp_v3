<?php

namespace App\Http\Controllers\Fleetomata\Trips;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domain\Truck\Models\Truck;
use App\Domain\Trips\Models\Trip;

class TripsController extends Controller
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
    public function store(Request $request)
    {
        $truck = Truck::findOrFail($request->truck_id);
        if ($truck->trip_id)
            return back()->withNotification([
                'type' => 'error',
                'msg' => 'Trip already exists'
            ]);
        $trip = $truck->trips()->create([
            'created_by' => auth()->user()->id,
        ]);
        $truck->trip_id = $trip->id;
        $truck->save();
        return redirect("fleetomata/trips/{$trip->id}");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Trip $trip)
    {
        return view("fleetomata.trips.show")->with([
           'trip' => $trip->load('truck','orders.vendor')
        ]);
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
}
