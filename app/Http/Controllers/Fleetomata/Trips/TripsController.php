<?php

namespace App\Http\Controllers\Fleetomata\Trips;

use App\Domain\Trips\Models\Trip;
use App\Domain\Truck\Models\Truck;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classes\Notification;
use App\Domain\Trips\Actions\CreateTripAction;
use App\Domain\Trips\Requests\CreateTripRequest;

class TripsController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }

    public function show(Trip $trip)
    {
//        dd($trip->ledgers);
        $audits = $trip->audits;

        return view("fleetomata.trips.show")->with([
            'trip' => $trip->load('truck','ledgers.createdBy','orders.vendor','ledgers.approval.approvedBy'),
            'audits' => $audits
        ]);
    }
    public function store(CreateTripRequest $request)
    {
        $truck = Truck::findOrFail($request->truck_id);
        if ($truck->trip_id){
            Notification::error('Trip already exists');
            return redirect()->back();
        }
        $createTripAction = new CreateTripAction();
        $trip = $createTripAction->handle($truck);
        $truck->trip_id = $trip->id;
        $truck->save();
        Notification::success('Trip Created Successfully!');
        return redirect("fleetomata/trips/{$trip->id}");
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
