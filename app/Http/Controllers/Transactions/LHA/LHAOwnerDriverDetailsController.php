<?php

namespace App\Http\Controllers\Transactions\LHA;

use App\Domain\LHAs\Models\LoadingHireAgreement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LHAOwnerDriverDetailsController extends Controller
{
    public function store(LoadingHireAgreement $loading_hire_agreement, Request $request)
    {
        $loading_hire_agreement->update($request->except('_token'));
        return redirect()->back()->withNotification([
            'type' => 'success',
            'msg' => "Details updated successfully"
        ]);
    }
}
