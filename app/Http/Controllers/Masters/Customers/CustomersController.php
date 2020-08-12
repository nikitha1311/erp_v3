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
    public function index()
    {
        $customers = Customer::all();
        return view('masters.customers.index')->with([
            'customers' => $customers
        ]);
    }

    public function create()
    {
        $customer = new Customer();
        return view('masters.customers.create')->with([
            'customer' => $customer
        ]);
    }

    public function store(CreateCustomerRequest $request)
    {
        $createCustomerAction = new CreateCustomerAction($request->name, $request->code,
            $request->address, $request->is_consignor, $request->is_consignee,
            $request->is_billed_on);
        $customer = $createCustomerAction->handle();
        Notification::success('Customer created successfully!');
        return redirect(route('customers.show', $customer->id));
    }

    public function show(Customer $customer)
    {
        $audits = $customer->audits;
        return view('masters.customers.show')->with([
            'customer' => $customer->load('contracts.createdBy'),
            'audits' => $audits
        ]);
    }


    public function edit(Customer $customer)
    {
        return view('masters.customers.edit')->with([
            'customer' => $customer
        ]);
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $updateCustomerAction = new UpdateCustomerAction($request->name, $request->code,
            $request->address, $request->is_consignor, $request->is_consignee,
            $request->is_billed_on);
        $customer = $updateCustomerAction->handle($customer);
        // dd($customer);
        Notification::success('Customer Updated successfully!');
        return redirect("/customers/{$customer->id}");
    }

    public function destroy($customer)
    {
        $customer = Customer::findOrFail($customer);
        $customer->delete();
        Notification::success('Customer Deleted successfully!');
        return redirect(route('customers.index'));
    }
}
