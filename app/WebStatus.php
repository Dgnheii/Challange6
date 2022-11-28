<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class WebStatus extends Eloquent
{
    use AuthenticableTrait;
    use Notifiable;
    protected $connection = 'mongodb';
    
    protected $table = "web_statuses";

    protected $fillable = ['user_id', 'website', 'status', 'ip', 'port',];

}
