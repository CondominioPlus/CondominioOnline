<?php

namespace App\Http\Requests\Condominios;

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
            'logo.mimes' => 'El logo debe estar en formato jpg, jpeg o png.',


        ];
    }

    public function rules(){
        return [
            'nombre' => 'string',
            'direccion' => 'string',
            'logo' => 'mimes:jpg,jpeg,png'
        ];
    }
}
