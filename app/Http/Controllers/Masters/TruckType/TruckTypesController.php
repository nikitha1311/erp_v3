<?php

namespace App\Http\Controllers\Masters\TruckType;

use App\Classes\Notification;

use App\Domain\TruckType\Models\TruckType;
use App\Domain\TruckType\Requests\CreateTruckTypeRequest;
use App\Domain\TruckType\Actions\CreateTruckTypeAction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TruckTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $truck=TruckType::all();
        return view('masters.truckType.index')->with(['trucks'=>$truck]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $truck=new TruckType();
        return view('masters.truckType.index')->with(['trucks'=>$truck]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTruckTypeRequest $request)
    {
        $createTruckTypeAction = new CreateTruckTypeAction($request->name);
        $truck = $createTruckTypeAction->handle();
        Notification::success('TruckType Created successfully!');
        return redirect('/truck-types');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TruckType $truckType)
    {
        return view('masters.truckType.show')
            ->with([
                'trucks' => $truckType,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TruckType $truck_type)
    {
        return view('masters.truckType.edit')->with(['trucks'=>$truck_type]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TruckType $truck_type)
    {
        $createTruckTypeAction = new CreateTruckTypeAction($request->name);
        $truck_type = $createTruckTypeAction->handle();
        Notification::success('TruckType Updated successfully!');
        return redirect('/truck-types');
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
