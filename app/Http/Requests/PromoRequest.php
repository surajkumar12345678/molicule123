<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromoRequest extends FormRequest
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
            'promocode'=>'required',
            'discount'=>'required',
            'discount_type'=>'required',
            'no_of_times'=>'required',
            'valid_until'=>'required'
        ];
    }

}
