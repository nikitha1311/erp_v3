<?php

namespace App\Domain\GCs\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGCRequest extends FormRequest
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
            'number' => 'unique:goods_consignment_notes,number,'.$this->goods_consignment_note->id
        ];
    }
    public function messages()
    {
        return [
            'number.unique'  => 'GC Number is assigned to another transaction',
        ];
    }

    public function handle($goodsConsignmentNote)
    {
        if($this->request->has('date'))
            $goodsConsignmentNote->update([
                'date' => formatDMY($this->request->get('date'))
            ]);
        return $goodsConsignmentNote
            ->fill(request()->except('date'))
            ->update();
    }
}
