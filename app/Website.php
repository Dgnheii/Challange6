<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Website extends Model
{
    // use HasFactory;
    
    protected $table = 'websites';

    protected $fillable = [
        'website'
    ];

    public function getWebsiteList()
    {
        $websites = DB::table('websites')->select('website')->get();
        return $websites;
    }
}
