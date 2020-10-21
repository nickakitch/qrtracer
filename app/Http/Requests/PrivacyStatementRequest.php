<?php

namespace App\Http\Requests;

class PrivacyStatementRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'message' => ['max:500'],
            'url' => ['url', 'max:255']
        ];
    }

    public function authorize()
    {
        return auth()->check();
    }

    public function filters()
    {
        return [
            'message' => 'trim|escape',
            'url' => 'trim|escape_url',
        ];
    }

}
