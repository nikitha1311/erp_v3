<?php

namespace App\Http\Controllers\Fleetomata\Trucks;

use App\Domain\Truck\Models\Truck;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domain\Truck\Requests\CreateTruckRequest;
use App\Domain\Truck\Requests\UpdateTruckRequest;
use App\Domain\Truck\Actions\CreateTruckAction;
use App\Domain\Truck\Actions\UpdateTruckAction;
use App\Classes\Notification;

class TrucksController extends Controller
{

    public function index()
    {
        $truck=Truck::all();
        return view('fleetomata.trucks.index')->with(['trucks'=>$truck]);
    }


    public function create()
    {
        $truck = new Truck();
        return view('fleetomata.trucks.create')->with([
            'truck' => $truck,
        ]);
    }


    public function store(CreateTruckRequest $request)
    {
        $createTruckAction = new CreateTruckAction($request->number,$request->truck_type_id,$request->group);
        $truck = $createTruckAction->handle();
        Notification::success('Truck created successfully!');
        return redirect(route('trucks.index'));
    }


    public function show(Truck $truck)
    {
        $currentExpenses = $truck->truckExpenses()->where('valid_till', '>', now())->get();
        $oldExpenses = $truck->truckExpenses()->where('valid_till', '<', now())->get();
        return view("fleetomata.trucks.show")->with([
            'truck' => $truck->load('type', 'trips.orders','truckExpenses'),
            'currentExpenses' => $currentExpenses,
            'oldExpenses' => $oldExpenses,

        ]);
    }


    public function edit(Truck $truck)
    {
        return view('fleetomata.trucks.edit')->with([
            'truck' => $truck
        ]);
    }


    public function update(UpdateTruckRequest $request, Truck $truck)
    {
        $updateTruckAction = new UpdateTruckAction($request->number,$request->truck_type_id,$request->group);
        $truck = $updateTruckAction->handle($truck);
        Notification::success('Truck Updated successfully!');
        return redirect(route('trucks.show',[$truck->id]));
    }


    public function destroy($truck)
    {
        $truck = Truck::findOrFail($truck);
        $truck->delete();
        Notification::success('Truck Deleted successfully!');
        return redirect()->back();
    }
}
