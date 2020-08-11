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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $location=Location::all();
        return view('masters.locations.index')->with(['locations'=>$location]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $location=new Location();
        return view('masters.locations.index')->with(['locations'=>$location]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLocationRequest $request)
    {
        $createLocationAction = new CreateLocationAction($request->formatted_address, $request->locality, $request->district, $request->state,$request->postal_code);
        $location = $createLocationAction->handle();
        Notification::success('Location created successfully!');
        return redirect('/locations');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        $audits = $location->audits;
        return view('masters.locations.show')
            ->with([
                'locations' => $location,
                'audits' => $audits
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        return view('masters.locations.edit')->with(['locations'=>$location]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLocationRequest $request,Location $location)
    {
        $updateLocationAction = new UpdateLocationAction($request->formatted_address, $request->locality, $request->district, $request->state,$request->postal_code);
        $location = $updateLocationAction->handle($location);
        Notification::success('Location created successfully!');
        return redirect("/locations/$location->id");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        if ($location) {
            $location->delete();
        }
        Notification::success('Location Deleted successfully!');
        return redirect()->back();
    }
}
