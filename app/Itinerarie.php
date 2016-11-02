<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itinerarie extends Model
{
    //
    protected $table="itineraries";

    protected $fillable = [
        'id','type','description', 'start', 'end','enable'];
}
