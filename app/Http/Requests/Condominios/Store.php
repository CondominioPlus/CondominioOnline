<?php

namespace App\Http\Requests\Condominios;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function messages(){
        return [
            'nombre.required' => 'Por favor ingresa un nombre.',
            'apellidos.required' => 'Por favor ingresauna dirección.',
            'logo.mimes' => 'El logo debe estar en formato jpg, jpeg o png.',


        ];
    }

    public function rules(){
        return [
            'nombre' => 'required|string',
            'direccion' => 'required|string',
            'logo' => 'mimes:jpg,jpeg,png'
        ];
    }
}
