<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['certificate_user_id','entity', 'payment_file','amount' ,'operation', 'operation_date', 'enable'];
}

