<?php

namespace App\Http\Controllers;

use App\Models\Answers_special_conditions;
use App\Models\Contracts;
use App\Models\Notifications;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;use Illuminate\Support\Str;
use App\Models\Token_firebase;

class NotificationsController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
//      return ":a";

//      $notifications =Notifications::all();

      $notifications =Notifications::
      whereHas('sender', function ($q){
          $q->wherein("type",[1,2]);
      })->get();
        $user = User::where('type',3)->get();
//        return $notifications;

      return view('notification.notification',compact('notifications','user'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {

      $Notifications = new Notifications();
      $Notifications->sender_id = Auth::user()->id;
      $Notifications->receiver_id = request('receiver_id');
      $Notifications->message = request('message');
         $Notifications->status = "0";
      $Notifications->message_type = "0";

      $Notifications->save();


          $token=Token_firebase::where('user_id', request('receiver_id'))->orderBy('id', 'DESC')->first();
        // return $token;
      if (!empty($token->fcm_token)){
      try {
          $headers =[
              'Authorization:key=AAAAN1ZQdPk:APA91bHkwgFROJ8KNq-YJE4h99i7qiejTPUZWnXbCsvISHfqe3EOfZwa7VQlYzJGY-9G1WBagdH48Ua6CKUgrKvcsX5Hnv-BMWxYqGpkqxHz4MUAVbS_D-DjPL0_9zIkZOAn-oCDm_kN',
              'Content-Type:application/json'
          ];


      $data=[
          "data" => [
              "title" => 'مؤسسة للمقاولات',
              "body" => $request->message,
          ],
          "notification" => [
              'type' => "notify",
              "title" => 'مؤسسة للمقاولات',
              "body" => $request->message,
          ],

          "to" => $token->fcm_token,
      ];

          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
          $result = curl_exec($ch);
          curl_close($ch);

        // return json_encode($result);

      } catch (\Exception $ex) {
          return $ex->getMessage();
      }
}
      session()->flash('Add', 'تم اضافة الاشعار  بنجاح ');
      return redirect('dashboard/notification');
  }
    public function storeAllUser(Request $request)
    {

        $user = User::where('type',3)->get();
        $data = [];
        foreach ($user as $res){

            $data[]=$res->id;
        }
        $user = User::where('type',$data)->get();
        $data2=array_count_values($data);
        $data3= [];

        return $data;

        if ($request->sender_id > 0) {
            if (count($request->sender_id) > 0) {
                foreach ($request->sender_id as $item => $v) {
                    $date1 = [

                        'sender_id' =>$request->sender_id[$item],
                        'receiver_id' =>$data2,
                        'message' => $request->message[$item],
                    ];

                    Notifications::insert($date1);
                }
            }
        }
//
//        $Notifications = new Notifications();
//        $Notifications->sender_id = Auth::user()->id;
//        $Notifications->receiver_id = request('receiver_id');
//        $Notifications->message = request('message');
//        $Notifications->status = "1";
//
//        $Notifications->save();
        session()->flash('Add', 'تم اضافة الاشعار  بنجاح ');
        return redirect('dashboard/notification');
    }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
      $notifications =Notifications::where('contract_id',$id)->get();

      return view('notification.show',compact('notifications'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {

  }

}

?>
