<?php

namespace App\Http\Requests\Unidad;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class Update extends FormRequest
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
            'numero.numeric' =>'El número de la unidad debe contener un valor numerico.',
            'numero_cajones.numeric' =>'El número de los cajones de estacionamiento debe contener un valor numerico.',



        ];
    }

    public function rules(){
        return [
            'notas' => 'string',
            'numero' => 'numeric|min:1',
            'numero_cajones' => 'numeric|nullable'
        ];
    }
}
