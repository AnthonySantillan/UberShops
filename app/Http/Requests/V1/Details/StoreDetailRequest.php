<?php

namespace App\Http\Requests\V1\Details;

use Illuminate\Foundation\Http\FormRequest;

class StoreDetailRequest extends FormRequest
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
            'amount' => ['required', 'max:20'],
            'delivery_date' => ['required'],
            'delivery_time' => ['required'],
            'value' => ['required', 'max:50'],

        ];
    }

    public function attributes()
    {
        return [
            'amount' => 'cantidad',
            'delivery_date' => 'fecha de entrega',
            'delivery_time' => 'hora de entrega',
            'value' => 'valor'


        ];
    }
}
