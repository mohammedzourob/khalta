<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Contracts;
use App\Models\Notifications;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
  public function notification(){
//      select('id','code','status','contract_file')
      $user_id=auth('api')->user()->id;
      $notification=Notifications::where("receiver_id",$user_id)
         
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

      $projects = Contracts::find($contract_id);
      $projects->status = request('status');
      $projects->update();

      $notification = Notifications::where("contract_id",$contract_id)->first();
      $notification->message_type = "0";
      $notification->update();
      return parent::success($notification);


  }
}
