<?php

namespace App\Http\Requests\V1\Vehicles;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVehicleRequest extends FormRequest
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
            'plate' => ['required', 'min:2', 'max:10'],
            'color' => ['required', 'max:50'],
            'enrollment' => ['required', 'max:50'],
            'year' => ['required', 'max:50'],

        ];
    }

    public function attributes()
    {
        return [
            'plate' => 'placa del vehiculo',
            'color' => 'colror',
            'enrollment' => 'matricula',
            'year' => 'año'

        ];
    }
}
