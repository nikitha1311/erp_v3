<?php

namespace App\Http\Controllers\Transactions\LHA;

use App\Domain\LHAs\Models\LoadingHireAgreement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Notification;

class LHAOwnerDriverDetailsController extends Controller
{
    public function store(LoadingHireAgreement $loading_hire_agreement, Request $request)
    {
        $loading_hire_agreement->update($request->except('_token'));
        Notification::success('Details Updated Successfully');
        return redirect()->back();
    }
}
