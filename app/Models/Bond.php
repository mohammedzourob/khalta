<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bond extends Model
{

    protected $fillable = [
        'contract_number','supervisor_name','exchange_amount','user_id','exchange_reason','date_of_application','viewing_status'

    ];
    protected $table = 'bond';
    public $timestamps = true;

    public static $rules = [
        'supervisor_name' => 'required',
        'contract_number' => 'required',

    ];
    public function users()
    {
        return $this->belongsTo('App\Models\Users','user_id');
    }
}
