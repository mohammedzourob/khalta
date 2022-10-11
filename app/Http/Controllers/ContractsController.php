<?php

namespace App\Http\Controllers;

use App\Models\Contracts;
use App\Models\Invoices;
use App\Models\Notifications;
use App\Models\Projects;
use App\Models\Sections;
use App\Models\Structural_drawing_image;
use App\Models\Work_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PDF;
use App\Models\Token_firebase;

class ContractsController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $contracts =Contracts::orderBy('id', 'DESC')->get();

      return view('contracts.contracts',compact('contracts'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */

    public function add_price($id)
    {
        $contracts = Contracts::find($id);


        return view('contracts.add_price',compact('contracts'));
    }

  public function updatePrice(Request $request)
  {
    // return $request->all();
      $user_id=Auth::user()->id;
      $contract_id = $request->id;
      $Contracts = Contracts::find($contract_id);
      $project= $Contracts->project_id;
      $construction_type= $Contracts->construction_type;

      $Contracts->update($request->all());
      $pdf=Contracts::where('id',$Contracts->id)->with('user')->first();
//      return $pdf;
      if (($project == "1" or $project == "2" or $project == "3" or $project == "4")and ($construction_type == "2") ) {
          $p = PDF::loadView('contract2.index2', compact('pdf'));
      }elseif(($project == "1" or $project == "2" or $project == "3" or $project == "4")and ($construction_type == "1") ){
          $p = PDF::loadView('contract3.index2', compact('pdf'));
      }elseif(($project == "5" or $project == "6" ) ) {
          $p = PDF::loadView('contract1.index2', compact('pdf'));
      }elseif(($project == "7" ) ) {
          $p = PDF::loadView('contract4.index2', compact('pdf'));
      }
      $path = 'api/final_contract/';

      $fileName =  time().'.'. 'pdf' ;
      $p->save($path . '/' . $fileName);
      $generated_pdf_link ='api/final_contract/'.$fileName;
      $pdf->final_contract = $generated_pdf_link;
      $pdf->update();



      $notification = new Notifications();
      $notification->sender_id = $user_id ;
      $notification->receiver_id = $Contracts->user->id;
      $notification->contract_id = $contract_id;

      if ($Contracts->price_details != ""){
          $notification->message = "عرض السعر المقدم عقد رقم "
              .$Contracts->code." "
              .$Contracts->price_details." إجمالي عرض السعر هو "
              .$Contracts->price."  ريال سعودي";
      }else {
          $notification->message = "يرجى العلم بان عرض السعر المقدم من قبل مؤسسة خلطة للمقاولة العامة عقد رقم "
              . $Contracts->code . " هو "
              . $Contracts->price . "  ريال ";
      }
//      return $notification->message ;
      $notification->message_type = "1";
      $notification->status = "0";
      $notification->save();

          $token=Token_firebase::where('user_id',  $Contracts->user->id)->orderBy('id', 'DESC')->first();
        //   return $token;

      if (!empty($token->fcm_token)){
      try {
          $headers =[
              'Authorization:key=AAAAN1ZQdPk:APA91bHkwgFROJ8KNq-YJE4h99i7qiejTPUZWnXbCsvISHfqe3EOfZwa7VQlYzJGY-9G1WBagdH48Ua6CKUgrKvcsX5Hnv-BMWxYqGpkqxHz4MUAVbS_D-DjPL0_9zIkZOAn-oCDm_kN',
              'Content-Type:application/json'
          ];


      $data=[
          "data" => [
              "title" => 'مؤسسة خلطة للمقاولات',
              "body" => $notification->message,
          ],
          "notification" => [
              'type' => "notify",
              "title" => 'مؤسسة خلطة للمقاولات',
              "body" =>  $notification->message,
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
      session()->flash('Add', 'تم اضافة السعر بنجاح ');
      return redirect('dashboard/contracts');

  }
    public function updateviewing(Request $request)
    {
        $id = $request->id;
        $projects = Contracts::find($id);
        $projects->viewing_status = request('viewing_status');
        $projects->update();
        return response()->json([
            'employees' => $projects->viewing_status,
            'id' => $projects->id,

        ]);
    }

    public function view_images($id)
    {

        $work =Structural_drawing_image::where('contract_id',$id)->get();

        return view('contracts.view_images',compact('work'));
    }
    public function Completion_project(Request $request)
  {
//      return $request->all();

      $user_id=Auth::user()->id;
      $contract_id = $request->id;

        $projects = Contracts::find($contract_id);

        $projects->status = request('status');
        $projects->update();
        session()->flash('Add', 'تم انتهاء العقد بنجاح ');
        return redirect('dashboard/contracts');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
    public function updateStatusClearance(Request $request)
    {
//        return $request->all();
        $id = $request->id;
        $projects = Contracts::find($id);
        $projects->viewing_status = '1';
        $projects->clearance_status_admin = request('clearance_status_admin');
        $projects->update();

        session()->flash('success', 'تم تعديل حالة المخالصة بنجاح ');

        return redirect('dashboard/clearance_cases');


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

    public function clearance_cases()
    {

        $clearance = Contracts::where('approval' , '!=',NULL)->get();
        return view('clearance_cases.clearance_cases',compact('clearance'));

    }
    public function updateviewingclearance(Request $request)
    {
        $id = $request->id;
        $projects = Contracts::find($id);
        $projects->Clearance_viewing_status = request('Clearance_viewing_status');
        $projects->update();
        return response()->json([
            'employees' => $projects->Clearance_viewing_status,
            'id' => $projects->id,

        ]);
    }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */


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
