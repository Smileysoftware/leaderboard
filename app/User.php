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

    public static function fetchRunners(  )
    {
        return User::where('runner' , '1')->get();
    }

    public static function createRunner( $data )
    {
        $u = new User;

        $u->firstname = $data['firstname'];
        $u->surname = $data['surname'];
        $u->dob = $data['dob'];
        $u->email = $data['email'];
        $u->runner = 1;

        $u->save();
    }
}
