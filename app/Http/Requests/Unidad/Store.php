<?php

namespace App\Http\Requests\Unidad;

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
            'notas.string' => 'El logo debe estar en formato jpg, jpeg o png.',
            'numero.required' => 'La Unidad Privativa debe tener un número.',
            'numero.numeric' =>'El número de la unidad debe contener un valor numerico.',
            'numero_cajones.numeric' =>'El número de los cajones de estacionamiento debe contener un valor numerico.',



        ];
    }

    public function rules(){
        return [
            'notas' => 'string|nullable',
            'numero' => 'numeric|min:1|required',
            'numero_cajones' => 'numeric|nullable'
        ];
    }
}
