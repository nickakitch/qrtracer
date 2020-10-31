<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Rules\ReCaptchaRule;
use DateTimeZone;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'business_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'timezone' => ['nullable', 'string', Rule::in(DateTimeZone::listIdentifiers())],
            'recaptcha_token' => ['required', new ReCaptchaRule($input['recaptcha_token'])]
        ])->validate();

        return User::create([
            'business_name' => $input['business_name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'timezone' => $input['timezone']
        ]);
    }
}
