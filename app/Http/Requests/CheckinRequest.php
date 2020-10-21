<?php

namespace App\Http\Requests;

class CheckinRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'name' => ['required'],
            'phone' => ['required_without:email'],
            'email' => ['required_without:phone', 'email']
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
