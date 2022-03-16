<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = [
        'follow', 'follower',
    ];
    public function post()
    {
        return $this->belongsTo('App\Post', 'foreign_key');
    }

}
