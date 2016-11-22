<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'role_id', 'name', 'email', 'password','dni','celular','universidad','carrera','ciclo','egresado','created_at','androidtoken'
    ];

    protected $hidden = [
        'password', 'remember_token', 'role_id'
    ];

    public function role() {
        return $this->belongsTo('App\Role');
    }

    public function milestones()
    {
        return $this->belongsToMany('App\Milestone');
    }
}
