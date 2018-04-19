<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword as ResetPasswordNotification;

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
        'name','surname','address','phonenumber','gender', 'email', 'password','birthdate','paymentcard','roles','year','month','day','password-confirm','profilepic','age','dealer_approve','shopname',
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
        return $this->belongsToMany('App\Product', 'product_info', 'users_id', 'products_id');
    }
    public function carts()
    {
        return $this->hasOne('App\Cart');
    }

    public function wishlists()
    {
        return $this->hasOne('App\Wishlist', 'wishlist_id', 'users_id');
    }

    public function sendPasswordResetNotification($token)
    {
        // Your your own implementation.
        $this->notify(new ResetPasswordNotification($token));
    }
}