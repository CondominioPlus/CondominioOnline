<?php

namespace App\Http\Requests\TUP;

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

    public function messages(){
        return [
            'nombre.*.required' => 'Por favor ingresa al menos un nombre.',
        ];
    }
    public function rules(){
        return [
            'nombre.*' => 'required',
        ];
    }
}
