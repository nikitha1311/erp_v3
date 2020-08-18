<?php

namespace App\Http\Controllers;

use App\Domain\Customers\Models\Customer;
use App\Domain\LHAs\Models\LoadingHireAgreement;
use App\Domain\TruckType\Models\TruckType;
use App\Domain\Vendors\Models\Vendor;
use Illuminate\Http\Request;

class PlayGroundCOntroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $vendor = Vendor::query()->whereHas('loadingHireAgreement')->get();
       
        // $plucked = $vendor->pluck('name','id');
        // foreach($vendor as $key => $value) {
        //     return [
        //         $plucked
        //     ];      
        // }

        // $truckType = LoadingHireAgreement::find(1);
        // dd($truckType);
        // $truckType = TruckType::query()->whereHas('loadingHireAgreement')->get();
        // $plucked = $truckType->pluck('name','id');
        // dd($plucked);

        // $customer = Customer::all();
        // $customer = Customer::query()->whereHas('transactions')->get();
        // dd($customer);
        
        $customer = Customer::query()->whereHas('transactions',function($transaction){
            $transaction->whereHas('loadingHireAgreements');
        })->get();
        dd($customer);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
