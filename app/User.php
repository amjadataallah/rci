<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    
    public $rules = [
            'username' => 'required|min:6|max:45',
            'password' => 'required|confirmed|min:6|max:20',
            'mobile' => 'required|digits_between:9,13',
            'email' => 'required|email|unique:users,email',
            'date_of_birth' => 'required|date'
    ];
    
    /**
     * Validation Rules that applies when in-place edeting
     *
     */
    
    public static $editabel_rules = [
            'username' => 'min:6|max:45',
            'mobile' => 'digits_between:9,13',
            'email' => 'email|unique:users,email_address',
            'date_of_birth' => 'date|before:today'
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'email', 'password', 'mobile'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
}
