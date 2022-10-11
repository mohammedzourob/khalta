<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    protected $fillable = [
        'sender_id','receiver_id','contract_id','work_id','message','message_type','status'
    ];
    protected $table = 'notifications';
    public $timestamps = true;

    public function sender()
    {
        return $this->belongsTo('App\Models\User','sender_id');
    }
    public function receiver()
    {
        return $this->belongsTo('App\Models\User','receiver_id');
    }
    public function contract()
    {
        return $this->belongsTo('App\Models\Contracts','contract_id');
    }
}
