<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'                  => 'required',
            'price'                 => 'required|numeric|between:0,1000000.99',
            'qty'                   => 'required|integer',
            'addMoreFile.*.urlFile' => 'nullable|url',            
        ];
    }


    public function messages() {
        return [
            'name.required'             => trans('lang.product_name_is_required'),
            'price.required'            => trans('lang.price_is_necessary'),
            'price.required'            => trans('lang.price_is_necessary'),
            'price.numeric'             => trans('lang.price_must_be_integer_or_decimals'),
            'price.between'             => trans('lang.price_between'),
            'qty.required'              => trans('lang.qty_is_necessary'),
            'qty.integer'               => trans('lang.qty_must_be_an_integer'),
            'addMoreFile.*.urlFile.url' => trans('lang.url_must_be_valid'),


        ];
    }
}
