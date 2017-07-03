<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class Inicio extends FormRequest
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

     public function messages()
    {
        return [
            'nombre.required' => 'Por favor ingresa un nombre.',
            'apellidos.required' => 'Por favor ingresa  apellidos.',
            'email.required' => 'Por favor ingresa un email.',
            'telefono.required' => 'Por favor ingresa un telefono.',
            'password.required' => 'Por favor ingresa una contraseña.',


        ];
    }
    public function rules()
    {
        return [
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'email' => 'required|email|unique:users',
            'telefono' => 'required|numeric',
            'password' => 'required|confirmed|alpha_dash|min:8'
        ];
    }
}
