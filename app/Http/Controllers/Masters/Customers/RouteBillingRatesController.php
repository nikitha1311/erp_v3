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

class RouteBillingRatesController extends Controller
{
    public function index(Route $route)
    {
        $locations = Location::all();
        $truck_types = TruckType::all();
        return view('masters.routes.show')->with([
            'route' => $route,
            'locations' => $locations,
            'truck_types' => $truck_types,
        ]);
    }

    public function create(Route $route)
    {
        // dd($route);
        return view('masters.billingRates.create')->with([
            'route' => $route,
        ]);
    }

    public function store(CreateBillingRateRequest $request, Route $route)
    {
        $createRouteBillingRateAction = new CreateBillingRateAction($request->rate,
            $request->description, $request->wef, $route->id);
        $billing_rate = $createRouteBillingRateAction->handle();
        Notification::success('Billing Rate created successfully!');
        return redirect(route('routes.show', [$route->contract_id, $route->id]));
//        return redirect("/customers/{$customer->id}/contracts/{$contract->id}/routes/{$route->id}");
    }

    public function show(Customer $customer, Contract $contract, Route $route, BillingRate $billing_rate)
    {
        // dd($billing_rate->wef->format('d-m-Y'));
        return view('masters.billingRates.show')->with([
            'route' => $route,
            'billingrate' => $billing_rate,
            'customer' => $customer,
            'contract' => $contract,
        ]);
    }

    public function edit(Customer $customer, Contract $contract, Route $route, BillingRate $billing_rate)
    {
        return view('masters.billingRates.edit')->with([
            'route' => $route,
            'billingrate' => $billing_rate,
            'customer' => $customer,
            'contract' => $contract
        ]);
    }

    public function update(UpdateBillingRateRequest $request, $route, BillingRate $billing_rate)
    {
        $updateRouteBillingRateAction = new UpdateBillingRateAction($request->rate,
            $request->description, $request->wef, $route, $billing_rate);
        $billing_rate = $updateRouteBillingRateAction->handle();
        Notification::success('Billing Rate Updated successfully!');
        return redirect(route('billing-rates.show', [$route, $billing_rate->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($route,$billing_rate)
    {
        $billing_rate = BillingRate::findOrFail($billing_rate);
        $billing_rate->delete();
        Notification::success('BillingRate Deleted successfully!');
        return redirect()->back();
    }
}
