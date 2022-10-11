<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    protected $fillable = [
        'contract_id','name','image','date','publisher','status','viewing_status'

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
}
