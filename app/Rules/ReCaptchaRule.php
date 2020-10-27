<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Mockery\Exception;
use ReCaptcha\ReCaptcha;

class ReCaptchaRule implements Rule
{
    private $error_message = "";

    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        try {
            if (env('APP_ENV') === 'testing') {
                return true;
            }

            if (empty($value)) {
                throw new Exception(':attribute field is required.');
            }

            $recaptcha = new ReCaptcha(env('RECAPTCHA_SECRET_KEY'));

            $response = $recaptcha->setExpectedHostname($_SERVER['SERVER_NAME'])
                ->setScoreThreshold(0.5)
                ->verify($value, $_SERVER['REMOTE_ADDR']);

            if (!$response->isSuccess()) {
                throw new Exception('ReCaptcha field is required.');
            }

            if ($response->getScore() < 0.5) {
                throw new Exception('Failed to validate captcha.');
            }

            return true;

        } catch (Exception $error) {
            $this->error_message = $error->getMessage();
            return false;
        }
    }

    public function message()
    {
        return $this->error_message;
    }
}
