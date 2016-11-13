<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    //
    protected $fillable = ['id','user_id','turn', 'enable'];
}
