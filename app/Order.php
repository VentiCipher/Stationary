<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // use Notifiable;
    //protected $guard = 'web';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'users_id','address','invoice','payments_id','methods','delivery_cost','coupon','ordercode','cards','total',
    ];

    public function users()
    {
        return $this->belongsTo('App\User','orders_id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product','order_pack','orders_id','products_id')->withPivot('amount')
            ->withTimestamps();
    }

    public function payments()
    {
        return $this->hasOne('App\Payment','orders_id');
    }
}
