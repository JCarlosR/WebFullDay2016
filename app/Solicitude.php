<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitude extends Model
{
	protected $table="solicitudes";
    protected $fillable = ['id','user_id', 'cert_id', 'paid','enable'];

    public function certificate()
    {
        return $this->belongsTo('App\Certificate');
    }

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
}
