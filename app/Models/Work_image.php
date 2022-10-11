<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work_image extends Model
{
    protected $fillable = [
        'work_id','image'
    ];
    protected $hidden = ['work_id','id'];
    protected $table = 'work_image';
    public $timestamps = false;

    public function work()
    {
        return $this->belongsTo('App\Models\Work','work_id');
    }
}
