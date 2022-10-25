<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Contracts;
use App\Models\Invoices;
use App\Models\Notifications;
use App\Models\Work;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class InvoicesController extends Controller
{
    public function show($id)
    {
        $user_id=auth('api')->user()->id;

        $work=Invoices::where('status',"1")->where('contract_id',$id)
//            ->whereHas('contract', function($q) use(  $user_id) {
//                $q->where("user_id",$user_id);
//
//            })
            ->with('contract:id,code')
             ->orderBy('id', 'DESC')->get();


        return parent::success($work);
    }
    public function search(Request $request)
    {
        $user_id=auth('api')->user()->id;
        $value = $request->keyword;

        $contracts = Invoices::where('status',"1")
            ->whereHas('contract', function($q) use($value , $user_id) {

            $q->where("user_id",$user_id)
                ->where('code' ,$value )
                ->orwhere('id_card_number', $value);

        }) ->orderBy('id', 'DESC')->with("contract:id,code,id_card_number")->get();
        if(count($contracts) == 0)
        {
            return parent::success("عذرا لا توجد اي نتائج");
        }
        return parent::success($contracts);
    }

    public function store(Request $request)
    {

        $validation = Validator::make($request->all(), Invoices::$rules);
        if ($validation->fails()) {
            return parent::error($validation->errors());
        }
//        $work= Work::create($request->all());

        $invoices = new Invoices();
        $invoices->contract_id = request('contract_id');
        $invoices->name = request('name');
//        $invoices->image =request('image');
        $invoices->date = request('date');

        $invoices->publisher = Auth::User()->name;
        $invoices->user_id = Auth::User()->id;
        $invoices->status = "0";



        if ($request->file('image') ) {
            $name = Str::random(12);
            $path = $request->file('image')->move('public/api/invoices',

                $name . time() . '.' . $request->file('image')->getClientOriginalExtension());
            $invoices->image= $path;
        }
//        return parent::success(request('image'));

        $id=$invoices->contract_id;
//        return $id;


        $invoices->save();
//        $code=Contracts::where('id',$id)->first();
//        $user_id=auth('api')->user()->id;
//        $notification = new Notifications();
//        $notification->sender_id = $user_id ;
//        $notification->receiver_id = $code->user->id ;
//        $notification->contract_id = $invoices->contract_id;
//        $notification->message = "تم أضافة فاتورة جديدة للعقد رقم " .$code->code;
//
//        $notification->message_type = "0";
//        $notification->status = "0";
//        $notification->save();
        return parent::success($invoices);
    }
}
