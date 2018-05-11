<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    // use Notifiable;
    protected $guard = 'web';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','users_id','products_id','amount',
    ];

    public function users()
    {
        return $this->belongsTo('App\User','carts_id');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }
    
}
