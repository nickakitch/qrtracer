<?php

namespace App\Http\Requests;

use App\Rules\ReCaptchaRule;

class CheckinRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'max:255'],
            'phone' => ['required_without:email', 'max:255'],
            'email' => ['required_without:phone', 'email', 'max:255'],
            'recaptcha_token' => ['required', new ReCaptchaRule($this->input('recaptcha_token'))]
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
