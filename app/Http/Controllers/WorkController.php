<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use App\Models\Notifications;
use App\Models\Work;
use App\Models\Work_image;
use Illuminate\Http\Request;
use App\Models\Token_firebase;

class WorkController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $work =Work::orderBy('id', 'DESC')->get();

      return view('work.work',compact('work'));
  }

    public function view_images($id)
    {

        $work =Work_image::where('work_id',$id)->get();

        return view('work.view_images',compact('work'));
    }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */

    public function updateStatus(Request $request)
    {
//        return $request->all();
        $id = $request->id;
        $projects = Work::find($id);
        $projects->viewing_status = request('viewing_status');
        $projects->status = request('status');
        $projects->update();


        $Notifications = Notifications::where("work_id",$id)->first();
        // return $Notifications;

        if ($Notifications != ""){
            if ($projects->status == "1"){
                $Notifications->status = "1";
            }else{
                $Notifications->status = "0";
            }

        $Notifications->update();
        }
        $token=Token_firebase::where('user_id', $Notifications ->status)->orderBy('id', 'DESC')->first();
        //$token=Token_firebase::where('user_id', $Notifications)->orderBy('id', 'DESC')->first();

        // return $token;
      if (!empty($token->fcm_token)){
      try {
          $headers =[
              'Authorization:key=AAAAN1ZQdPk:APA91bHkwgFROJ8KNq-YJE4h99i7qiejTPUZWnXbCsvISHfqe3EOfZwa7VQlYzJGY-9G1WBagdH48Ua6CKUgrKvcsX5Hnv-BMWxYqGpkqxHz4MUAVbS_D-DjPL0_9zIkZOAn-oCDm_kN',
              'Content-Type:application/json'
          ];


      $data=[
          "data" => [
              "title" => 'مؤسسة خلطة للمقاولات',
              "body" => "تم اضافة عمل جديد",
          ],
          "notification" => [
              'type' => "notify",
              "title" => 'مؤسسة خلطة للمقاولات',
            "body" => "تم اضافة عمل جديد",
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

        session()->flash('success', 'تم تعديل حالة العمل بنجاح ');

        return redirect('dashboard/work');


    }

    public function updateviewing(Request $request)
    {
        $id = $request->id;
        $projects = Work::find($id);
        $projects->viewing_status = request('viewing_status');
        $projects->update();
        return response()->json([
            'employees' => $projects->viewing_status,
            'id' => $projects->id,

        ]);
    }

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

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

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
