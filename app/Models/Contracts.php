<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contracts extends Model
{
    protected $fillable = [
        'user_id','section_id','project_id','construction_type','code','id_card_number',
        'id_card_date','status_card_issuer','status_card_image','Instrument_no','Instrument_date',
        'Instrument_image','building_permit_number','license_date','license_image','engineering_office_name',
        'engineer_name','engineer_phone_email','starch_chart_image','price','status','approval','website_image',
        'suggested_projects','projects_details','contract_file','final_contract','price_details','reason_review','viewing_status','Clearance_viewing_status','duration_project','Work_guarantee_period','clearance_status_admin',
        'price1','price2','price3','price4','price5','paying1','paying2','paying3','paying4','paying5','paying6','paying7'
        ,'payment_content1','payment_content2','supervisor','payment_content3','payment_content4','payment_content5','payment_content6','payment_content7'

    ];
    protected $table = 'contracts';
    public $timestamps = true;
    protected $casts = [
        'status' => 'int',

        ];
    public static $rules_api = [
//        'status_card_image' => 'required',
//        'id_card_number' => 'required',
//        'id_card_date' => 'required',
//        'status_card_issuer' => 'required',

    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');

    }
    public function section()
    {
        return $this->belongsTo('App\Models\Sections','section_id');
    }
    public function project()
    {
        return $this->belongsTo('App\Models\Projects','project_id');
    }

}
