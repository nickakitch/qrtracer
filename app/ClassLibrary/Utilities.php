<?php

namespace App\ClassLibrary;

use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Utilities
{
    public static function uuidFor($model)
    {
        do {
            $uuid = uniqid();
            $uuid_is_taken = $model::where('uuid', $uuid)->exists();
        } while($uuid_is_taken);

        return $uuid;
    }

    public static function qrCodeImageUrl(string $string, int $size = 300)
    {
        $filename = md5($string).'.png';

        if (!Storage::disk()->exists('public/' . $filename)) {
            Storage::put('public/' . $filename, QrCode::gradient(60, 99, 130, 96, 163, 188, 'diagonal')
                ->style('round')
                ->eye('circle')
                ->size($size)
                ->format('png')
                ->generate($string));
        }

        return Storage::url($filename);
    }
}
