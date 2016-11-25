<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    protected $fillable = ['id','name','date','time'];

    public function getTimeAttribute( $val )
    {
        $hour   = substr($val,0,2);
        $minute = substr($val,3,2);
        $hour   = intval($hour);
        $minute = intval($minute);

        if( $minute<10 )
            $minute = '0'.$minute;
        if( $hour==0 )
            $time = '12:'.$minute.' am';
        elseif( $hour<12 )
            $time = $hour.':'.$minute.' am';
        elseif( $hour==12 )
            $time = '12:'.$minute.' pm';
        else
            $time = ($hour%12).':'.$minute.' pm';

        return $time;
    }
    public function getDateAttribute( $val )
    {
        $date = new Carbon($val);
        $date = $date->format('jS \o\f F, Y');

        return $date;
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withPivot('check')->withTimestamps();
    }
}
