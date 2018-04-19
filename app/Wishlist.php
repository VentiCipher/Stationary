<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
  
    protected $guard = 'web';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','users_id','products_id',
    ];
    public function users()
    {
        return $this->belongsTo('App\User');
    }
    public function products()
    {
        return $this->hasMany('App\Product');
    }
    
}
