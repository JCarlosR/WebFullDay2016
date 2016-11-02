<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Role extends Authenticatable
{
    public $timestamps = false;

    public function users() {
        return $this->hasMany('App\User');
    }
}
