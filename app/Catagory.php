<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   // use Notifiable;
    //protected $guard = 'web';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','createby','description'
    ];
    public function products()
    {
        return $this->belongsToMany('App\Product','matcher','products_id','categories_id');
    }
}
