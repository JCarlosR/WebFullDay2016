<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $fillable = ['id','description','turn', 'type', 'enable'];
    protected $hidden =['created_at','updated_at','enable'];
}
