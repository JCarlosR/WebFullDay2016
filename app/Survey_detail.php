<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey_detail extends Model
{
    //
    protected $fillable = ['id','survey_id','question_id', 'answer','score','enable'];
}
