<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'role_id', 'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token', 'role_id'
    ];

    public function role() {
        return $this->belongsTo('App\Role');
    }
}
