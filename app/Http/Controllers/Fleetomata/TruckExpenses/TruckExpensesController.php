<?php

namespace App\Http\Controllers\Fleetomata\TruckExpenses;

use App\Domain\Truck\Models\Truck;
use App\Domain\TruckExpenses\Actions\CreateTruckExpenseAction;
use App\Domain\TruckExpenses\Models\TruckExpense;
use App\Domain\TruckExpenses\Requests\CreateTruckExpenseRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Notification;

class TruckExpensesController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(CreateTruckExpenseRequest $request,Truck $truck)
    {
        $createTruckExpenseAction = new CreateTruckExpenseAction($request->expense_date,$request->type,$request->type_description,$request->amount,$request->valid_till);
        $truck = $createTruckExpenseAction->handle($truck);
        Notification::success('Truck Expense Created Successfully!');
        return redirect()->back();
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


    public function destroy(Truck $truck, TruckExpense $truckExpense)
    {
        $truckExpense->delete();
        Notification::success('TruckExpense Deleted successfully!');

        return back();
    }
    public function approve(Truck $truck, TruckExpense $truckExpense)
    {
        $truckExpense->approve();
        Notification::success('TruckExpense Approved successfully!');

        return back();
    }

}
