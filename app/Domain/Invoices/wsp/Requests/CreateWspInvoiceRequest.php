<?php

namespace App\Domain\Invoices\wsp\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateWspInvoiceRequest extends FormRequest
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
            'number' => 'unique:invoices,number',
            'total' => 'required'
        ];
    }
}
