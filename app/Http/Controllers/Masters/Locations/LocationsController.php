<?php

namespace App\Http\Controllers\Masters\Locations;
use App\Classes\Notification;

use App\Domain\Locations\Actions\CreateLocationAction;
use App\Domain\Locations\Actions\UpdateLocationAction;
use App\Domain\Locations\Models\Location;
use App\Domain\Locations\Requests\CreateLocationRequest;
use App\Domain\Locations\Requests\UpdateLocationRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocationsController extends Controller
{

    public function index()
    {
        $location=Location::all();
        return view('masters.locations.index')->with(['locations'=>$location]);
    }


    public function create()
    {
        $location=new Location();
        return view('masters.locations.index')->with(['locations'=>$location]);
    }


    public function store(CreateLocationRequest $request)
    {
        $createLocationAction = new CreateLocationAction($request->formatted_address, $request->locality, $request->district, $request->state,$request->postal_code);
        $location = $createLocationAction->handle();
        Notification::success('Location created successfully!');
        return redirect('/locations');

    }


    public function show(Location $location)
    {
        $audits = $location->audits;
        return view('masters.locations.show')
            ->with([
                'locations' => $location,
                'audits' => $audits
            ]);
    }


    public function edit(Location $location)
    {
        return view('masters.locations.edit')->with(['locations'=>$location]);
    }


    public function update(UpdateLocationRequest $request,Location $location)
    {
        $updateLocationAction = new UpdateLocationAction($request->formatted_address, $request->locality, $request->district, $request->state,$request->postal_code);
        $location = $updateLocationAction->handle($location);
        Notification::success('Location created successfully!');
        return redirect("/locations/$location->id");

    }


    public function destroy(Location $location)
    {
        if ($location) {
            $location->delete();
        }
        Notification::success('Location Deleted successfully!');
        return redirect()->back();
    }
}
