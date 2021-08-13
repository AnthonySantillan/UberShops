<?php

namespace App\Http\Requests\V1\Sellers;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSellerRequest extends FormRequest
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

            'ruc' => ['required', 'max:50'],

        ];
    }

    public function attributes()
    {
        return [
            'ruc' => 'ruc del vendedor',

        ];
    }
}
