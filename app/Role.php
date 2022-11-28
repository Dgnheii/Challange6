<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Role extends Eloquent
{
    public $timestamps = false;

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission');
    }
}
