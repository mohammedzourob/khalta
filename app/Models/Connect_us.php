<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Connect_us extends Model
{
    protected $fillable = [
        'phone','email','content','viewing_status'
    ];
    protected $table = 'connect_us';
    public $timestamps = true;


    public static $rules = [
        'email' => 'required|min:3',
        'phone' => 'required|min:3',


    ];
}
