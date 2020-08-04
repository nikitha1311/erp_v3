<?php

namespace App\Http\Controllers\Transactions\LHA;

use App\Domain\LHAs\Models\LHAsTimestampCreater;
use App\Domain\LHAs\Models\LoadingHireAgreement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Notification;

class LHATimestampsController extends Controller
{
    public function store(LoadingHireAgreement $loading_hire_agreement, Request $request)
    {
        $notification = [];
        try {
            $timeStampCreater = new LHAsTimestampCreater($loading_hire_agreement,$request);
            $notification = $timeStampCreater->handle();
        } catch (\Exception $e){
            Notification::error('Unable to Update Log!');

        }
        return back();
    }
}
