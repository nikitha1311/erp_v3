<?php

namespace App\Domain\TruckType\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTruckTypeRequest extends FormRequest
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
            'name' => 'unique:truck_types,name,'.$this->truck_type->id

        ];
    }
}
