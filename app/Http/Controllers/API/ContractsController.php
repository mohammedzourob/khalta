<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Contracts;
use App\Models\Notifications;
use App\Models\Structural_drawing_image;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PDF;

class ContractsController extends Controller
{

    public function show()
    {
        $user_id=auth('api')->user()->id;

        $contracts = Contracts::Where('user_id', $user_id)->select('id', 'code','id_card_number')
            ->orderBy('id', 'DESC')->get();
        return parent::success($contracts);

    }


    public function showِAll()
    {

        // $contracts = Contracts::all();
        $contracts = Contracts::orderBy('id', 'DESC')->select('id', 'code')->get();
        return parent::success($contracts);

    }
    public function search(Request $request)
    {
        $user_id=auth('api')->user()->id;
        $value = $request->keyword;

            if ($value != '') {
                $contracts = Contracts::where('user_id', $user_id)
                    ->Where(function ($query) use ($value) {
                        $query->where('code', $value)
                            ->orwhere('id_card_number', $value);
                    })
                    ->select('id', 'code','id_card_number')
                    ->get();
                if(count($contracts) == 0)
                {
                    return parent::success("عذرا لا توجد اي نتائج");
                }
            } else {
                return parent::success("الرجاء ادخال قيمة");
            }
            return parent::success($contracts);


    }

    public function contract_Status($id){

        $contracts = Contracts::where('id', $id)->select('id','code','status','contract_file','final_contract')->first();
        return parent::success($contracts);
    }
    public function StatusUpdate(Request $request){

        $user_id=auth('api')->user()->id;
        $contract_id = $request->id;


//      $validated = $request->validate(Projects::$rules_edit,Projects::$message_ar);

        $projects = Contracts::find($contract_id);
        $projects->status = request('status');
        $projects->reason_review = request('reason_review');

        $projects->update();

        //message_type
        $notifications=Notifications::where('sender_id',1)->where('contract_id',$contract_id)->first();

        $notifications['message_type'] = "0";
         $notifications->status = "1";
        $notifications->update();

        return parent::success($notifications);

    }
    public function finalcLearance($id){
//        $user_id=auth('api')->user()->id;
//        $projects = Contracts::find($user_id);
//        $projects->price = request('price');
//        $projects->status = "6";

//        $projects->update();
        $contracts = Contracts::where('id', $id)->with('user:id,name')->select('id','code','id_card_number','user_id','clearance_status_admin')->first();

        return parent::success($contracts);

    }

        public function finalcLearanceUpdate(Request $request , $id){


        $projects = Contracts::find($id);

        $projects['Clearance_viewing_status'] = "0";
        $projects['clearance_status_admin'] = "0";

        $projects->update($request->all());
        $contracts = Contracts::where('id', $id)->select('id','code','approval')->first();

            return parent::success($contracts);
        }


    public function searchAll(Request $request)
    {
        $user_id=auth('api')->user()->id;
        $value = $request->keyword;

        if ($value != '') {
            $contracts = Contracts::Where(function ($query) use ($value) {
                    $query->where('code', $value)
                        ->orwhere('id_card_number', $value);
                })
                ->select('id', 'code')
                ->get();
            if(count($contracts) == 0)
            {
                return parent::success("عذرا لا توجد اي نتائج");
            }
        } else {
            return parent::success("الرجاء ادخال قيمة");
        }
        return parent::success($contracts);

    }
    public function store(Request $request){
//    return $request->all();
        $user=auth('api')->user();

        if (!$user){
            return parent::error('يجب عليك تسجيل الدخول');
        }
        $id= Contracts::orderBy('id', 'DESC')->first();
//        return $id;
        $code=$id->id + 1 ;
        $validation = Validator::make($request->all(),Contracts::$rules_api);
        if ($validation->fails()){
            return parent::error( $validation->errors());
        }
//        return $request->all();
        $contracts = new Contracts();
        $contracts->user_id = $user->id;
        $contracts->section_id = $request->section_id;
        $contracts->project_id = $request->project_id;
        $contracts->construction_type = $request->construction_type;

        //الكود
          $project =  $request->project_id;
        if ($project == "1" or $project == "2" or $project == "3" or $project == "4"){
            $contracts->code = "01".$code;
        }else{
            $contracts->code = "02".$code;
        }
        $project =  $request->project_id;
        //ملف المشروع
        $project =  $request->project_id;
        $construction_type=  $request->construction_type;


        $contracts->id_card_number = request('id_card_number');
        $contracts->id_card_date = request('id_card_date');
        $contracts->status_card_issuer = request('status_card_issuer');
//        $contracts->status_card_image = request('status_card_image');//image

        $contracts->Instrument_no = request('Instrument_no');
        $contracts->Instrument_date = request('Instrument_date');
//        $contracts->Instrument_image = request('Instrument_image');//image


        $contracts->building_permit_number = request('building_permit_number');
        $contracts->license_date = request('license_date');
//        $contracts->license_image = request('license_image');//image

        $contracts->engineering_office_name = request('engineering_office_name');
        $contracts->engineer_name = request('engineer_name');
        $contracts->engineer_phone_email = request('engineer_phone_email');
        //        $contracts->starch_chart_image = request('starch_chart_image');//image

        //مشاريع مقترحة(اخرى)
        $contracts->suggested_projects = request('suggested_projects');
        $contracts->projects_details = request('projects_details');

        $contracts->price = request('price');
        $contracts->status = "0";
        $contracts->viewing_status = "0";


        if ($request->file('status_card_image') ) {
            $name = Str::random(12);
            $path = $request->file('status_card_image')->move('api/status_card_image',
                $name . time() . '.' . $request->file('status_card_image')->getClientOriginalExtension());
            $contracts->status_card_image= $path;
        }

        if ($request->file('Instrument_image') ) {
            $name = Str::random(12);
            $path = $request->file('Instrument_image')->move('api/Instrument_image',
                $name . time() . '.' . $request->file('Instrument_image')->getClientOriginalExtension());
            $contracts->Instrument_image= $path;
        }

        if ($request->file('license_image') ) {
            $name = Str::random(12);
            $path = $request->file('license_image')->move('api/license_image',
                $name . time() . '.' . $request->file('license_image')->getClientOriginalExtension());
            $contracts->license_image= $path;
        }

//        if ($request->file('starch_chart_image') ) {
//            $name = Str::random(12);
//            $path = $request->file('starch_chart_image')->move('api\starch_chart_image',
//                $name . time() . '.' . $request->file('starch_chart_image')->getClientOriginalExtension());
//            $contracts->starch_chart_image= $path;
//        }
        if ($request->file('website_image') ) {
            $name = Str::random(12);
            $path = $request->file('website_image')->move('api/website_image',
                $name . time() . '.' . $request->file('website_image')->getClientOriginalExtension());
            $contracts->website_image= $path;
        }
//        return parent::success( $contracts);
        $contracts->save();



        $files = $request->file('starch_chart_image');
        if (!empty($files)) {
            foreach ($files as $file) {
                $img = new Structural_drawing_image();
                $img->contract_id = $contracts->id;
                $name = Str::random(12);
                $path = $file->move('api/starch_chart_image', $name . time() . '.' . $file->getClientOriginalExtension());
                $img->image = $path;
                $img->save();
            }
        }
        $notification = new Notifications();
        $notification->sender_id = $user->id ;
        $notification->receiver_id = "1" ;
        $notification->contract_id = $contracts->id;
        $notification->message = " قام ".$user->name . "بأضافة عقد جديد";

       $notification->message_type = "1";
      $notification->status = "0";
        $notification->save();


        $pdf=Contracts::where('id',$contracts->id)->with('user:id,name')->first();

        if (($project == "1" or $project == "2" or $project == "3" or $project == "4")and ($construction_type == "2") ) {
            $p = PDF::loadView('contract2.index1', compact('pdf'));
        }elseif(($project == "1" or $project == "2" or $project == "3" or $project == "4")and ($construction_type == "1") ){
            $p = PDF::loadView('contract3.index1', compact('pdf'));
        }elseif(($project == "5" or $project == "6" ) ) {
            $p = PDF::loadView('contract1.index1', compact('pdf'));
        }elseif(($project == "7" ) ) {
            $p = PDF::loadView('contract4.index1', compact('pdf'));
        }
        $path = 'api/contract_file/';

        $fileName =  time().'.'. 'pdf' ;
        $p->save($path . '/' . $fileName);
        $generated_pdf_link ='api/contract_file/'.$fileName;
        $pdf->contract_file = $generated_pdf_link;
        $pdf->update();
        $pdf->refresh();

//        return response()->json($generated_pdf_link);
        return parent::success($pdf);

    }
}
