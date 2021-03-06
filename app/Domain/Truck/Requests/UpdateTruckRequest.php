<?php

namespace App\Domain\Truck\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTruckRequest extends FormRequest
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
        // dd($this);
        return [
            'number' => 'required|unique:trucks,number,'.$this->truck->id,
            'truck_type_id' => 'required',
            'group' => 'required'
        ];
    }
}
