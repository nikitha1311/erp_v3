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
        return [
            'name' => 'required,'.$this->vendor->id,
            'phone' => 'numeric|unique:vendors,phone|digits:10,'.$this->vendor->id,
            'company_name' => 'required,'.$this->vendor->id,
            'address' => 'required,'.$this->vendor->id,
        ];
    }
}
