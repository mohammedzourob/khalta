<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Connect_us;
use App\Models\Contracts;
use App\Models\Invoices;
use App\Models\Notifications;
use App\Models\User;
use App\Models\Work;
use App\Models\Work_image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class WorkController extends Controller
{

    public function show($id)
    {

        $user_id=auth('api')->user()->id;


            $work=Work::where('status',"1")->where('contract_id',$id)->with('contract:id,code') ->orderBy('id', 'DESC')->get();


        return parent::success($work);
    }



    public function search(Request $request){

        $user_id=auth('api')->user()->id;

        $value= $request->keyword;
        if($value!= '') {
            $work=Work::where('status',"1")
                ->whereHas('contract', function($q) use($value , $user_id) {
                    $q->where("user_id",$user_id)
                        ->where('code' ,$value )
                        ->orwhere('id_card_number', $value);

                })->with('image') ->orderBy('id', 'DESC')->get();
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
        $user_id=auth('api')->user();
        $validation = Validator::make($request->all(), Work::$rules);
        if ($validation->fails()) {
            return parent::error($validation->errors());
        }
//        $work= Work::create($request->all());

        $work = new Work();
        $work->contract_id = request('contract_id');
        $work->name = request('name');
//        $work->image = request('image');
        $work->date = request('date');

        $work->publisher = $user_id->name;
        $work->user_id = Auth::User()->id;
        $work->status = "0";
//
//        if ($request->hasFile('image')) {
//            $files=$request->file('image');
//            $photosPath = [];


//            foreach ($files as $file) {
//                $path = explode('/', $file->move('public'))[1];
//                $work->work_id = $work->id;
//                $photosPath[] = new Work_image([
//                    'image'=>$path,
//                    'work_id'=>$work
//
//                ]);
//                $work->image()->saveMany($photosPath);
//
//            }
//
//
//        }

            if ($request->file('image') ) {
                $name = Str::random(12);
                $path = $request->file('image')->move('public/api/work',

                    $name . time() . '.' . $request->file('image')->getClientOriginalExtension());
                $work->image= $path;
            }
        $work->save();




        $id=$work->id;
        $contract_id=$work->contract_id;
        $code=Contracts::where('id',$contract_id)->first();



        $notification = new Notifications();
        $notification->sender_id = $user_id->id ;
        $notification->receiver_id = $code->user_id;
        $notification->contract_id = $code->id;
        $notification->work_id = $id;
        $notification->message = "تم أضافة عمل جديدة للعقد رقم " .$code->code;

        $notification->message_type = "0";
        $notification->status = "0";
        $notification->save();

            return parent::success($work);

    }
}
