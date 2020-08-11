<?php

namespace App\Domain\Vendors\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVendorRequest extends FormRequest
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
        // dd($this->vendor);
        return [
            'name' => 'required',
            'phone' => 'numeric|digits:10',
            'company_name' => 'required',
            'address' => 'required',
        ];
    }
}
