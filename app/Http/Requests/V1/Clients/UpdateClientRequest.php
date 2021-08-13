<?php

namespace App\Http\Requests\V1\Clients;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
            'card' => ['required', 'max:20'],

        ];
    }

    public function attributes()
    {
        return [
            'card' => 'tarjeta de credito',


        ];
    }
}