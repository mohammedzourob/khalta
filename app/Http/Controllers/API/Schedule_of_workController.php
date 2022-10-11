<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Contracts;
use App\Models\Notifications;
use App\Models\Schedule_of_work;
use App\Models\Work;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class Schedule_of_workController extends Controller
{
    public function search(Request $request){

//        $user_id=auth('api')->user()->id;

        $value= $request->keyword;
        if($value!= '') {
            $work=Schedule_of_work::
                whereHas('contract', function($q) use($value ) {
//                    $q->where("user_id",$user_id)
                    $q->where('code' ,$value )
                        ->orwhere('id_card_number', $value);

                })->orderBy('id', 'DESC')->with("contract:id,code,id_card_number")->get();
            if(count($work) == 0)
            {
                return parent::success("عذرا لا توجد اي نتائج");
            }
        }else{
            return parent::success("الرجاء ادخال قيمة");
        }

        return parent::success($work);
    }
    public function store(Request $request)
    {

        $validation = Validator::make($request->all(),Schedule_of_work::$rules);
        if ($validation->fails()){
            return parent::error( $validation->errors());
        }
//        $work= Work::create($request->all());

        $work = new Schedule_of_work();
//        $work->contract_id = request('contract_id');
//        $work->name = request('name');
//        $work->email = request('email');
//        $work->date = request('date');

        $work->contract_id = $request->contract_id;
        $work->name =  $request->name ;
        $work->email =$request->email;
        $work->date = $request->date;

        $work->publisher = Auth::User()->name;
        $work->status = "1" ;


        $work->save();
        $id=$work->contract_id;

        $code=Contracts::where('id',$id)->first();
        $user_id=auth('api')->user()->id;
        $notification = new Notifications();
        $notification->sender_id = $user_id ;
        $notification->receiver_id = $code->user->id ;
        $notification->contract_id = $work->contract_id;
        $notification->message = "تم أضافة جدول اعمال جديد للعقد رقم " .$code->code;

        $notification->message_type = "0";
        $notification->status = "0";

        $notification->save();
        
        


        return parent::success( $work);

    }
}
