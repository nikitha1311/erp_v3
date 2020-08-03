<?php

namespace App\Domain\GCs\Requests;

use App\Domain\GCs\Models\GoodsConsignmentNote;
use Illuminate\Foundation\Http\FormRequest;

class CreateGCRequest extends FormRequest
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
            'number' => 'required|unique:goods_consignment_notes,number|alpha_num'
        ];
    }
    public function handle()
    {
        $data = request()->except('_token');
        $data['number'] = strtoupper(request('number'));
        $data['created_by'] = auth()->user()->id;
        $data['date'] = formatDMY($data['date']);
        return GoodsConsignmentNote::create($data);
    }
}
