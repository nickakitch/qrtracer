<?php

namespace App\Http\Requests;

class CheckinRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'max:255'],
            'phone' => ['required_without:email', 'max:255'],
            'email' => ['required_without:phone', 'email', 'max:255']
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function filters()
    {
        return [
            'name' => 'trim|escape',
            'phone' => 'trim|escape',
            'email' => 'trim|escape_email'
        ];
    }
}
