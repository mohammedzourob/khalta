<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Special_conditions extends Model
{

    protected $fillable = [
        'project_id','question'
    ];
    protected $table = 'special_conditions';
    public $timestamps = true;
    protected $hidden = ['created_at','updated_at','project_id'];
    public static $rules = [
        'question' => 'required',

    ];

    public static $message = [

        'question.required' =>'يرجي ادخال السؤال'
    ];

    public function project()
    {
        return $this->belongsTo('App\Models\Projects','project_id');
    }
    public function answers()
    {
        return $this->hasMany(Answers::class,'question_id');
    }
}
