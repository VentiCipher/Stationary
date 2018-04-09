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
        'name','in_stock','categories_id','description','price', 'color', 'createby','promotions_id',
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
    public function images()
    {
        return $this->hasMany('App\Image','product_imgs','images_id','products_id');
    }
    public function categories()
    {
        return $this->belongsToMany('App\Category','matcher','categories_id','products_id');
    }
}
