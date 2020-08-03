<?php

namespace App\Http\Controllers\Transactions\LHA;

use App\Domain\LHAs\Models\LoadingHireAgreement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LHAsApprovalController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(LoadingHireAgreement $loading_hire_agreement, Request $request)
    {
        $loading_hire_agreement->approve();
        return back();
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
