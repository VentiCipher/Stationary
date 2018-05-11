<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    // use Notifiable;
    //protected $guard = 'web';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'users_id','methods','state','final','bankrecipe','expireday','orders_id','name','filepath'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function orders()
    {
        return $this->belongsTo('App\Order','orders_id');
    }
}
