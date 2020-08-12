<?php

namespace App\Http\Controllers\Fleetomata\Trips;

use App\Classes\Notification;
use App\Domain\Trips\Models\Trip;
use App\Domain\TruckLedgers\Actions\CreateTruckLedgerAction;
use App\Domain\TruckLedgers\Models\TruckLedger;
use App\Domain\TruckLedgers\Requests\CreateTruckLedgerRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TripsExpensesController extends Controller
{
    
    public function index()
    {
        //
    }

    
    public function create()
    {
        //
    }

   
    public function store(Trip $trip, CreateTruckLedgerRequest $request)
    {
        $createTruckLedgerAction = new CreateTruckLedgerAction($request->truck_id,$request->when,$request->type,
                                    $request->amount,$request->remarks);
        $truck_ledger = $createTruckLedgerAction->handle($trip);
        Notification::success('Expenses Noted successfully!');
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

    public function destroy($trip,TruckLedger $expense, Request $request)
    {
        $expense->delete();
        Notification::success('Expenses Deleted successfully!');
        return redirect()->back();
    }
}
