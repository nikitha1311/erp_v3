<?php

namespace App\Http\Controllers\Transactions\LHA;

use App\Domain\Transactions\Models\Transaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DefaultLHAController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Transaction $transaction, Request $request)
    {
        $transaction->makeDefaultLHA($request->lha_id);
        return back()->withNotification([
            'type' => 'success',
            'msg' => 'Default LHA status updated'
        ]);
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
