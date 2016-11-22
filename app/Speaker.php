<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
	protected $appends = [
		'first_paper'
	];

    protected $fillable = [
        'name', 'company', 'position', 'email', 'description', 'profile', 'image', 'enable'
    ];

    protected $hidden = [
    	'papers'
    ];

    public function papers()
    {
        return $this->hasMany('App\Paper');
    }

    public function getFirstPaperAttribute()
    {
    	return $this->papers->first();
    }
}
