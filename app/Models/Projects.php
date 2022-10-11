<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{

    protected $fillable = [
        'name','icon','status','type'
    ];
    protected $table = 'projects';
    public $timestamps = true;
    protected $hidden = ['created_at','updated_at','status'];
    public static $rules = [
        'name' => 'required|unique:projects|max:255',

    ];
    public static $rules_edit = [
        'name' => 'required:projects|max:255',
    ];

    public static $message_ar = [

        'name.required' =>'يرجي ادخال اسم المشروع',
//        'icon.required' =>'يرجي ادخال صورة',
        'name.unique' =>'اسم القسم مسجل مسبقا',
    ];

}
