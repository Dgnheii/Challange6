<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Post extends Eloquent
{
    use SoftDeletes;

    const STATUS_UNPUBLISHED = 'unpublished';

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
