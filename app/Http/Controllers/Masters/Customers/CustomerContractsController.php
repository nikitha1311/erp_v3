<?php

namespace App\Http\Controllers\Masters\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domain\Contracts\Models\Contract;
use App\Domain\Customers\Models\Customer;
use App\Domain\Routes\Models\Route;
use App\Domain\Contracts\Requests\CreateContractRequest;
use App\Domain\Contracts\Requests\UpdateContractRequest;
use App\Domain\Contracts\Actions\CreateCustomerContractAction;
use App\Domain\Contracts\Actions\UpdateCustomerContractAction;
use App\Classes\Notification;


class CustomerContractsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Customer $customer)
    {
        return view('masters.customers.show')->with([
            'customer' => $customer
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Customer $customer)
    {
        $contract = new Contract();
        return view('masters.contracts.create')->with([
            'customer' => $customer,
            'contract' => $contract
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateContractRequest $request, Customer $customer)
    {
        $createCustomerContractAction = new CreateCustomerContractAction($request->description, $request->signed_at, $request->valid_till, $request->status);
        $contract = $createCustomerContractAction->handle($customer);
        Notification::success('Contract created successfully!');
        return redirect("/customers/{$customer->id}/contracts");
    }

    public function show(Customer $customer, Contract $contract)
    {
        // dd($contract,$customer);
        // dd( $contract->load('routes'));
        return view('masters.contracts.show')->with([
            'customer' => $customer,
            'contract' => $contract->load('routes.from', 'routes.to', 'routes.truckType', 'routes.createdBy'),
        ]);
    }


    public function edit(Customer $customer, Contract $contract)
    {
        return view('masters.contracts.edit')->with([
            'customer' => $customer,
            'contract' => $contract
        ]);
    }


    public function update(UpdateContractRequest $request, Customer $customer, Contract $contract)
    {
        $updateCustomerContractAction = new UpdateCustomerContractAction($request->description, $request->signed_at, $request->valid_till, $request->status);
        $contract = $updateCustomerContractAction->handle($customer, $contract);
        Notification::success('Contract Updated successfully!');
        return redirect("/customers/{$customer->id}/contracts/{$contract->id}");
    }


    public function destroy($id)
    {
        //
    }
}
