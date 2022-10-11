<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = [
        'contract_id','name','image','date','publisher','status','viewing_status'

    ];

    protected $table = 'work';
    public $timestamps = true;
    protected $hidden = ['created_at','updated_at','status','publisher'];
    public static $rules = [
        'name' => 'required',


    ];
    public function contract()
    {
        return $this->belongsTo('App\Models\Contracts','contract_id');
    }
    public function image() {
        return $this->hasMany('App\Models\Work_image', 'work_id');
    }
}
