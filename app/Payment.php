<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['solicitude_id','entity', 'payment_file','amount' ,'operation', 'operation_date', 'enable'];

    public function solicitude()
    {
        return $this->belongsTo('App\Solicitude');
    }
}

