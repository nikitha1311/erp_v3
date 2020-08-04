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
}
