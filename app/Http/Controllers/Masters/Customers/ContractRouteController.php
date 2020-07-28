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
use App\Domain\Routes\Actions\UpdateContractRouteAction;
use App\Classes\Notification;

class ContractRouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Customer $customer, Contract $contract)
    {
        return view('masters.contracts.show')->with([
            'customer' => $customer,
            'contract' => $contract
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Contract $contract)
    {
        $route = new Route();
        $locations = Location::all();
        $truck_types = TruckType::all();
        return view('masters.routes.create')->with([
            'locations' => $locations,
            'truck_types' => $truck_types,
            'contract' => $contract,
            // 'customer' => $customer,
            'route' => $route
        ]);
    }

    public function store(CreateRouteRequest $request, $contract)
    {
        $createContractRouteAction = new CreateContractRouteAction($contract, [
            'from_id' => $request->from_id,
            'to_id' => $request->to_id,
            'is_active' => $request->is_active,
            'truck_type_id' => $request->truck_type_id,
        ]);
        $route = $createContractRouteAction->handle();
        Notification::success('Route created successfully!');
        return redirect(route('routes.show', [$route->contract_id, $route->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer, Contract $contract, Route $route)
    {
        $locations = Location::all();
        $truck_types = TruckType::all();
        return view('masters.routes.show')->with([
            'route' => $route,
            'customer' => $customer,
            'contract' => $contract,
            'locations' => $locations,
            'truck_types' => $truck_types,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract, Route $route)
    {
        $locations = Location::all();
        $truck_types = TruckType::all();
        return view('masters.routes.edit')->with([
            'route' => $route,
            // 'customer' => $customer,
            'contract' => $contract,
            'locations' => $locations,
            'truck_types' => $truck_types,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRouteRequest $request, Customer $customer, Contract $contract, Route $route)
    {
        // dd($request->truck_type_id);
        $updateContractRouteAction = new UpdateContractRouteAction($request->from_id, $request->to_id, $request->is_active,
            $request->truck_type_id, $request->deactivation_reason, $request->deactivated_by);
        $route = $updateContractRouteAction->handle($contract, $route);
        Notification::success('Route Updated successfully!');
        return redirect(route('routes.show', [$route->contract_id, $route->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
