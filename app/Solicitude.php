<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitude extends Model
{

	protected $table = "solicitudes";
    protected $fillable = ['id','user_id','state','certificate_id','enable'];

    public function certificate()
    {
        return $this->belongsTo('App\Certificate');
    }

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
