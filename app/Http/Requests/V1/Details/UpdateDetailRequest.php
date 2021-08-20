<?php

namespace App\Http\Requests\V1\Details;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDetailRequest extends FormRequest
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
            'amount' => ['required', 'min:2', 'max:10'],
            'delivery_date' => ['required', 'max:50'],
            'delivery_time' => ['required', 'max:50'],
            'value' => ['required', 'max:50'],

        ];
    }

    public function attributes()
    {
        return [
            'amount' => 'cantidad',
            'delivery_date' => 'fecha de entrega',
            'delivery_time' => 'hora de  entrega',
            'value' => 'valor'

        ];
    }
}
