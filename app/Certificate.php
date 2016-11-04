<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    //

    protected $fillable = ['id','type','event_id','cost','enable'];

    public function solicitudes()
    {
        return $this->hasMany('App\Solicitude');
    }

    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}
