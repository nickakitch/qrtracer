<?php

namespace App\Http\Requests;

class UpdatePasswordRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'current_password' => ['required', 'max:225'],
            'password' => ['required', 'min:8', 'max:225', 'confirmed']
        ];
    }

    public function authorize()
    {
        return auth()->check();
    }

    public function filters()
    {
        return [
            'current_password' => 'trim|escape',
            'password' => 'trim|escape'
        ];
    }

}
