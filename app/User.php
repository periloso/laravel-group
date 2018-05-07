<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    // Gestione eventi model
    public static function boot()
    {
        parent::boot();

        // Ad ogni salvataggio del model eseguo questo:
        static::saving(function($user) {
            if ($user->isDirty('password')) {
                $user->attributes['password'] = \Hash::make($user->attributes['password']);
            }
        });
    }
}
