<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answers_special_conditions extends Model
{
    use HasFactory;

    protected $fillable = [
        'contract_id','question_id','answers',

    ];
    protected $table = 'answers_special_conditions';
    public $timestamps = true;

    public static $rules = [
        'answers' => 'required',

    ];
    public function contract()
    {
        return $this->belongsTo('App\Models\Contracts','contract_id');
    }
    public function question()
    {
        return $this->belongsTo('App\Models\Special_conditions','question_id');
    }

}
