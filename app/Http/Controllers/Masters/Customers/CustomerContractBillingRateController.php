<?php

namespace App\Http\Controllers\Masters\Customers;

use App\Domain\BillingRates\Models\BillingRate;
use App\Domain\Contracts\Models\Contract;
use App\Domain\Customers\Models\Customer;
use App\Domain\Locations\Models\Location;
use App\Domain\TruckType\Models\TruckType;
use App\Domain\Routes\Models\Route;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domain\BillingRates\Actions\CreateBillingRateAction;
use App\Domain\BillingRates\Actions\UpdateBillingRateAction;
use App\Domain\BillingRates\Requests\CreateBillingRateRequest;
use App\Classes\Notification;
use App\Domain\BillingRates\Requests\UpdateBillingRateRequest;

class CustomerContractBillingRateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Customer $customer,Contract $contract,Route $route)
    {
        // return view('masters.routes.show')->with([
        //     'route' => $route,
        // ]);
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Customer $customer,Contract $contract,Route $route)
    {
        // dd($route);
        return view('masters.billingRates.create')->with([
            'route' => $route,
            'customer' => $customer,
            'contract' => $contract
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBillingRateRequest $request,Customer $customer,Contract $contract,Route $route,BillingRate $billing_rate)
    {
        // dd($route);
        $createRouteBillingRateAction = new CreateBillingRateAction($request->rate,
                                        $request->description,$request->wef);
        $billing_rate = $createRouteBillingRateAction->handle($route);
        Notification::success('Billing Rate created successfully!');
        return redirect("/customers/{$customer->id}/contracts/{$contract->id}/routes/{$route->id}");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer,Contract $contract,Route $route,BillingRate $billing_rate)
    {
        // dd($billing_rate->wef->format('d-m-Y'));
        $locations = Location::all();
        $truck_types = TruckType::all();
        return view('masters.billingRates.show')->with([
            'route' => $route,
            'billingrate' => $billing_rate,
            'customer' => $customer,
            'contract' => $contract,
            'locations' => $locations,
            'truck_types' => $truck_types,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer,Contract $contract,Route $route,BillingRate $billing_rate)
    {
        return view('masters.billingRates.edit')->with([
            'route' => $route,
            'billingrate' => $billing_rate,
            'customer' => $customer,
            'contract' => $contract
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBillingRateRequest $request,Customer $customer,Contract $contract,Route $route,BillingRate $billing_rate)
    {
        $updateRouteBillingRateAction = new UpdateBillingRateAction($request->rate,
                $request->description,$request->wef);
        $billing_rate = $updateRouteBillingRateAction->handle($route,$billing_rate);
        Notification::success('Billing Rate Updated successfully!');
        return redirect("/customers/{$customer->id}/contracts/{$contract->id}/routes/{$route->id}/billing-rate/{$billing_rate->id}");
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
