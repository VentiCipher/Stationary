<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class PImages extends Model
{
   // use Notifiable;
    protected $guard = 'web';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'products_id', 'path', 'createby',
    ];

    public function products()
    {
        return $this->belongsTo('App\Product');
    }
}
