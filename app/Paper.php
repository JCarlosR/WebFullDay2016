<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $fillable = [
        'speaker_id', 'subject', 'position', 'description', 'start', 'end', 'enable', 'realization'
    ];

    public function speaker()
    {
        return $this->belongsTo('App\Speaker');
    }
}
