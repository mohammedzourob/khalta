<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id','title',

    ];
    protected $table = 'answers';
    public $timestamps = true;
    protected $hidden = ['created_at','updated_at'];
    public static $rules = [
        'title' => 'required',


    ];
    public function question()
    {
        return $this->belongsTo('App\Models\Special_conditions','question_id');
    }
}
