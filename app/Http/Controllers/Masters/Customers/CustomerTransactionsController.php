<?php

namespace App\Http\Controllers\Masters\Customers;

use App\Domain\Customers\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerTransactionsController extends Controller
{

    public function index(Customer $customer)
    {
        return $customer->transactions()->whereNull('invoice_id')
            ->with('defaultLHA','goodsConsignmentNotes','loadingHireAgreements','route.from','route.to','route.truckType')
            ->get();
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
