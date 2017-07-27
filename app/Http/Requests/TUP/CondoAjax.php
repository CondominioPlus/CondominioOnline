<?php

namespace App\Http\Requests\TUP;

use Illuminate\Foundation\Http\FormRequest;

class CondoAjax extends FormRequest
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
            'id.numeric' => 'error el valor no es numerico',
        ];
    }
    public function rules(){
        return [
            'id' => 'numeric',
        ];
    }
}
