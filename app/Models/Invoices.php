<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    protected $fillable = [
        'contract_id','name','image','date','publisher','user_id','status','viewing_status'

        ];
    protected $hidden = ['created_at','updated_at','status','publisher'];
    protected $table = 'invoices';
    public $timestamps = true;


    public static $rules = [



    ];
    public function contract()
    {
        return $this->belongsTo('App\Models\Contracts','contract_id');
    }
    public function users()
    {
        return $this->belongsTo('App\Models\Users','user_id');
    }
}
