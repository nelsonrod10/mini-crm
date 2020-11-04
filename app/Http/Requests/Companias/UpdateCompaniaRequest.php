<?php

namespace App\Http\Requests\Companias;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompaniaRequest extends FormRequest
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
            'nombre' => 'string|required|min:3',
            'correo' => 'string|nullable',
            'logo'   => 'nullable|file|image|dimensions:min_width=100,min_height=100|max:2000',
            'pagina_web' => 'url|nullable',
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
            'max'       => 'El :attribute debe tener un tamaño máximo de :max',
            'string'    => 'El :attribute debe ser una cadena de texto',
            'file'      => 'El :attribute no es un archivo',
            'image'     => 'El :attribute no es una imagen',
            'dimensions'=> 'El :attribute debe ser como mínimo de 100x100 pixeles',
            'url'       => 'La página web debe ser una url válida, ejemplo https://www.example.com',
        ];
    }
}
