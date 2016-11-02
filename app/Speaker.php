<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    protected $fillable = [
        'name', 'company', 'position', 'email', 'description', 'profile', 'image', 'enable'
    ];

    public function papers()
    {
        return $this->hasMany('App\Paper');
    }
}
