<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   // use Notifiable;
    //protected $guard = 'web';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'in_stock', 'categories_id', 'description', 'price', 'color', 'createby', 'promotion_id', 'price_promo', 'users_id', 'categories[]','thumbsnail',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User', 'product_info', 'products_id', 'users_id');
    }
    public function images()
    {
        return $this->hasMany('App\Image', 'images_id', 'products_id');
    }
    public function categories()
    {
        return $this->belongsToMany('App\Categories', 'matcher', 'products_id', 'categories_id');
    }

    public function wishlists()
    {
        return $this->belongsTo('App\Wishlist');
    }
    public function carts()
    {
        return $this->belongsTo('App\Cart');
    }

    public function Orders()
    {
        return $this->belongsToMany('App\Order','order_pack','products_id','orders_id')->withPivot('amount')
        ->withTimestamps();
    }
}
