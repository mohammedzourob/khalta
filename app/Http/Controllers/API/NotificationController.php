<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Contracts;
use App\Models\Notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
  public function notification(){
//      select('id','code','status','contract_file')
      $user_id=auth('api')->user()->id;
      $notification=Notifications::where("receiver_id",$user_id)->select('message','message_type','status','created_at')

          ->orderBy('id', 'DESC')

          ->get();

      if(count($notification) == 0)
      {
          return parent::success("عذرا لا توجد اي نتائج");
      }

      return parent::success($notification);
  }
  public function update(Request $request ){

      $user_id=auth('api')->user()->id;
      $contract_id = $request->id;


//      $validated = $request->validate(Projects::$rules_edit,Projects::$message_ar);
//
//      $projects = Contracts::find($contract_id);
//      $projects->status = request('status');
//      $projects->update();

//$x=0;
      $notification = Notifications::select('message_type')->where('receiver_id',$user_id)->update(array('message_type'=>"1"));


      return parent::success($notification);


  }
}
