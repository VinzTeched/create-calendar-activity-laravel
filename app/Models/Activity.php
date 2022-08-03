<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{   
    protected $fillable = [
        'title', 'image', 'description', 'start', 'end', 'user_id', 'name'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
