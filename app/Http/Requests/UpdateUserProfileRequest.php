<?php

namespace App\Http\Requests;

class UpdateUserProfileRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'business_name' => ['required', 'max:225'],
            'email' => ['required', 'email', 'max:225', 'unique:users,email,'.auth()->user()->id]
        ];
    }

    public function authorize()
    {
        return auth()->check();
    }

    public function filters()
    {
        return [
            'business_name' => 'escape|trim',
            'email' => 'escape_email|trim'
        ];
    }

}
