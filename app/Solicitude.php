<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitude extends Model
{
	 protected $table="solicitudes";
     protected $fillable = ['id','user_id', 'cert_id', 'paid','enable'];
}
