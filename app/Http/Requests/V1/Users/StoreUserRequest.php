<?php

namespace App\Http\Requests\V1\Users;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'phone' => ['required', 'min:2', 'max:10'],
            'email' => ['required', 'max:50'],
            'direction' => ['required', 'max:50'],

        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nombre de usuario',
            'phone' => 'telefono',
            'email' => 'correo electrónico',
            'direction' => 'direccion'


        ];
    }
}
