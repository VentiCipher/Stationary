<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    // use Notifiable;
    protected $guard = 'web';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email','lineid',
    ];

    public function users()
    {
        return $this->belongsTo('App\User','email','email');
    }

    
}
