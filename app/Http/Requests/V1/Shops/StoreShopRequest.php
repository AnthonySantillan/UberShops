<?php

namespace App\Http\Requests\V1\Shops;

use Illuminate\Foundation\Http\FormRequest;

class StoreShopRequest extends FormRequest
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
            'name' => ['required', 'max:50'],
            'code' => ['required', 'min:2', 'max:10'],
            'direction' => ['required', 'max:50'],

        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nombre de la tienda',
            'code' => 'codigo',
            'direction' => 'direccion'


        ];
    }
}
