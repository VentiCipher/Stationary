<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    // use Notifiable;
    //protected $guard = 'web';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'salemore','freeship','info','limit','promocoder','createby'
    ];

//    public function users()
//    {
//        return $this->belongsTo('App\User');
//    }

//    public function products()
//    {
//        return $this->belongsTo('App\Product');
//    }
//
//    public function payments()
//    {
//        return $this->hasOne('App\Payment');
//    }
}
