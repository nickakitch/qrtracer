<?php

namespace App\Http\Requests;

use App\Http\Requests\CustomFilters\EscapeEmail;
use Elegant\Sanitizer\Laravel\SanitizesInput;
use Illuminate\Foundation\Http\FormRequest;

abstract class BaseFormRequest extends FormRequest
{
    use SanitizesInput;

    public function validateResolved()
    {
        {
            $this->sanitize();
            parent::validateResolved();
        }
    }

    public function sanitize()
    {
        $sanitizer = app('sanitizer')->make($this->input(), $this->filters());
        $sanitizer->addExtensions([
            'escape_email' => EscapeEmail::class
        ]);

        $this->replace($sanitizer->sanitize());
    }

    abstract public function authorize();

    abstract public function rules();

    abstract public function filters();
}
