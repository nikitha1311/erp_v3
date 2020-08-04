<?php

namespace App\Domain\LHAs\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLHARequest extends FormRequest
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
            'number'=>'unique:loading_hire_agreements,number,'.$this->loading_hire_agreement->id
        ];
    }

}
