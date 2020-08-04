<?php

namespace App\Domain\LHAs\Requests;

use App\Domain\LHAs\Models\LoadingHireAgreement;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use App\Domain\Constant;

class CreateLHARequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'branch_id'=>'required',
            'expected_delivery_date' => 'required',
            'number'=>'unique:loading_hire_agreements,number|alpha_num',
            'date'=>'required',
            'truck_number'=>'required',
            'type'=>'required',
            'from_id'=>'required',
            'to_id'=>'required',
            'truck_type_id'=>'required',
            'vendor_id'=>'required',
            'hire'=>'required'
        ];
    }
    public function handle()
    {

        $request=request()->all();
        dd($request);
//        dd($request['date'],now(),Carbon::createFromFormat('d-m-Y', $request['date']));
        return LoadingHireAgreement::create([
            'branch_id' => $request['branch_id'],
            'number' => request()->has('autogenerate') ? Constant::LHANumber() : strtoupper($request['number']),
            'from_id' => $request['from_id'],
            'to_id' => $request['to_id'],
            'truck_type_id' => $request['truck_type_id'],
            'vendor_id' => $request['vendor_id'],
            'truck_number' => strtoupper($request['truck_number']),
            'hire' => $request['hire'],
            'date' => formatDMY($request['date']),
            'expected_delivery_date' => formatDMY($request['expected_delivery_date']),
            'type' => $request['type'],
            'created_by' => auth()->user()->id,
        ]);
    }
}
