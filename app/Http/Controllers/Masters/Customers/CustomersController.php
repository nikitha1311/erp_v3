<?php

namespace App\Http\Controllers\Masters\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domain\Customers\Models\Customer;
use App\Domain\Customers\Requests\CreateCustomerRequest;

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
        // Customer::create([
        //     'name' => $request->name,
        //     'code' => $request->code,
        //     'address' => $request->address,
        //     'is_consignor' => $request->is_consignor,
        //     'is_consignee' => $request->is_consignee,
        //     'is_billed_on' => $request->is_billed_on,
        // ]);
        // return back()->withNotification([
        //    'type' => 'success',
        //    'msg' => 'Customer created successfully',
        // ]);
        // return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('masters.customers.show');
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

}
