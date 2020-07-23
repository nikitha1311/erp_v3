<?php

namespace App\Http\Controllers\Masters\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Notification;
use App\Domain\Customers\Models\Customer;
use App\Domain\Customers\Requests\CreateCustomerRequest;
use App\Domain\Customers\Requests\UpdateCustomerRequest;
use App\Domain\Customers\Actions\CreateCustomerAction;
use App\Domain\Customers\Actions\UpdateCustomerAction;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('masters.customers.index')->with([
            'customers' => $customers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masters.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCustomerRequest $request)
    {
        $createCustomerAction = new CreateCustomerAction($request->name, $request->code,
                                $request->address,$request->is_consignor,$request->is_consignee,
                                $request->is_billed_on);
        $customer = $createCustomerAction->handle();
        Notification::success('Customer created successfully!');
        return redirect('/customers');
    }

    /**
     * Display the specified resource.  
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('masters.customers.show')->with([
            'customer' => $customer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('masters.customers.edit')->with([
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request,Customer $customer)
    {
        $updateCustomerAction = new UpdateCustomerAction($request->name, $request->code,
                                $request->address,$request->is_consignor,$request->is_consignee,
                                $request->is_billed_on);
        $customer = $updateCustomerAction->handle($customer);
        Notification::success('Customer Updated successfully!');
        return redirect('/customers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
