<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['user_id','entity', 'payment_file', 'operation', 'operation_date', 'enable'];
}

