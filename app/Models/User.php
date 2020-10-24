<?php

namespace App\Models;

use App\ClassLibrary\Utilities;
use App\Notifications\PasswordChanged;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @method static where(string $string, $id)
 * @property mixed|null email_verified_at
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function (User $user) {
            $user->uuid = Utilities::uuidFor($user);
        });

        static::updating(function (User $user) {
            $changes = array_keys($user->getDirty());
            if (in_array('email', $changes)) {
                $user->email_verified_at = null;
                $user->sendEmailVerificationNotification();
            }
        });
    }
}
