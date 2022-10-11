<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Structural_drawing_image extends Model
{
    use HasFactory;

    protected $fillable = [
        'contract_id','image'
    ];
    protected $hidden = ['contract_id','id'];
    protected $table = 'structural_drawing_image';
    public $timestamps = false;

    public function contract()
    {
        return $this->belongsTo('App\Models\Work','contract_id');
    }
}
