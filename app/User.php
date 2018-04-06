<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $guard = 'web';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','surname','address','phonenumber','gender', 'email', 'password','birthdate','paymentcard','roles','year','month','day','password-confirm','profilepic','age',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','password-confirm',
    ];

    public function products()
    {
        return $this->hasMany('App\Product');
    }
    public function carts()
    {
        return $this->hasMany('App\Cart','carts','carts_id','users_id');
    }
}
