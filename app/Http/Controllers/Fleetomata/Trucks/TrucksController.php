<?php

namespace App\Http\Controllers\Fleetomata\Trucks;

use App\Domain\Truck\Models\Truck;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrucksController extends Controller
{

    public function index()
    {
        $truck=Truck::all();
        return view('fleetomata.trucks.index')->with(['trucks'=>$truck]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Truck $truck)
    {

        return view("fleetomata.trucks.show")->with([
            'truck' => $truck->load('type', 'trips.orders'),
        ]);
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
