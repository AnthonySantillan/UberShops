<?php

namespace App\Http\Requests\V1\Payments;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
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
            'value' => ['required', 'min:1', 'max:10'],

        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nombre del metodo de pago',
            'value' => 'valor',


        ];
    }
}
