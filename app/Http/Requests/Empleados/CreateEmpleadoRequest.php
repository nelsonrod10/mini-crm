<?php

namespace App\Http\Requests\Empleados;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmpleadoRequest extends FormRequest
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
            'compania'  => 'required|exists:companias,id',
            'nombre'    => 'string|required|min:3',
            'apellidos' => 'string|required|min:3',
            'correo'    => 'string|nullable',
            'telefono'  => 'string|nullable|min:7',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required'  => 'El :attribute es obligatorio',
            'min'       => 'El :attribute debe ser de mínimo :min caracteres',
            'string'    => 'El :attribute debe ser una cadena de texto',
            'exists'    => 'Esta compañia no existe en la base de datos'
        ];
    }
}
