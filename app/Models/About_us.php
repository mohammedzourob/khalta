<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About_us extends Model
{


    protected $fillable = [
        'logo','content','terms_conditions'
    ];

    protected $hidden = ['created_at','updated_at'];
    protected $table = 'about_us';
    public $timestamps = true;

}
