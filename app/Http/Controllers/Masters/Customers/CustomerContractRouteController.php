<?php

namespace App\Http\Controllers\Masters\Customers;

use App\Domain\Contracts\Models\Contract;
use App\Domain\Customers\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domain\Routes\Models\Route;
use App\Domain\Locations\Models\Location;
use App\Domain\TruckType\Models\TruckType;
use App\Domain\Routes\Requests\CreateRouteRequest;
use App\Domain\Routes\Requests\UpdateRouteRequest;
use App\Domain\Routes\Actions\CreateContractRouteAction;
use App\Classes\Notification;

class CustomerContractRouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('masters.contracts.show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Customer $customer,Contract $contract)
    {
        // dd($customer,$contract);
        $locations = Location::all();
        $truck_types = TruckType::all();
        return view('masters.routes.create')->with([
            'locations' => $locations,
            'truck_types' => $truck_types,
            'contract' => $contract,
            'customer' => $customer
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRouteRequest $request,Customer $customer,Contract $contract)
    {
        dd($request);
        $createContractRouteAction = new CreateContractRouteAction($request->from_id,$request->to_id,$request->is_active,
                                    $request->truck_type_id,$request->deactivation_reason,$request->deactivated_by);
        $route = $createContractRouteAction->handle($contract);
        Notification::success('Contract created successfully!');
        return redirect()->back();
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
}
