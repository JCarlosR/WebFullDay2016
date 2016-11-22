<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Milestone_user extends Model
{
    //
    protected $table="milestone_user";
    protected $fillable = ['id','milestone_id','user_id','check'];
}
