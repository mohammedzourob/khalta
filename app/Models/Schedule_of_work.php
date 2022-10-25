<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule_of_work extends Model
{

    protected $fillable = [
        'contract_id','name','email','date','publisher','user_id','status','viewing_status'

    ];
    protected $table = 'schedule_of_work';
    public $timestamps = true;


    public static $rules = [
//        'name' => 'required',

    ];

    public function contract()
    {
        return $this->belongsTo('App\Models\Contracts','contract_id');
    }
    public function users()
    {
        return $this->belongsTo('App\Models\user','user_id');
    }
}
