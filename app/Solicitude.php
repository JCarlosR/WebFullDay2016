<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitude extends Model
{

     protected $fillable = ['id','user_id', 'cert_id', 'paid','enable'];
}
