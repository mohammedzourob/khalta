<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{
    protected $fillable = [
        'project_id','name','status'
    ];
    protected $table = 'sections';
    public $timestamps = true;
    protected $hidden = ['created_at','updated_at','status'];
    public static $rules = [
        'name' => 'required|unique:Sections|max:255',

    ];
    public static $rules_edit = [
        'name' => 'required:Sections|max:255',
    ];
    public static $message = [

        'name.required' =>'يرجي ادخال اسم المشروع',

        'name.unique' =>'اسم القسم مسجل مسبقا',
    ];
    public function project()
    {
        return $this->belongsTo('App\Models\Projects','project_id');
    }
}
