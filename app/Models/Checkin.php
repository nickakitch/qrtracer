<?php

namespace App\Models;

use App\Casts\EncryptCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
    use HasFactory;

    protected $casts = [
        'name' => EncryptCast::class,
        'phone' => EncryptCast::class,
        'email' => EncryptCast::class
    ];

    protected $guarded = [];
}
