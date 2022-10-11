<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token_firebase extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id','fcm_token'
    ];
    protected $table = 'token_firebase';
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
}
