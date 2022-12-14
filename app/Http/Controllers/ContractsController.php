<?php

namespace App\Http\Controllers;

use App\Models\Contracts;
use App\Models\Invoices;
use App\Models\Notifications;
use App\Models\Projects;
use App\Models\User;
use App\Models\Sections;
use App\Models\Structural_drawing_image;
use App\Models\Work_image;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

      $supervisor=User::where('type',2)->get();

      return view('contracts.contracts',compact('contracts','supervisor'));
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


    public function updatesupervisor(Request $request)
    {
         $id=$request->id;
        $contracts=Contracts::find($id);

        $contracts['supervisor']=$request->supervisor;

        $contracts->update();

        return back();

    }

  public function updatePrice(Request $request)
  {
    // return $request->all();
      $user_id=Auth::user()->id;
      $contract_id = $request->id;
      $Contracts = Contracts::find($contract_id);


      $Contracts->update($request->all());
//      dd($Contracts);
//      $pdf=Contracts::where('id',$Contracts->id)->with('user')->first();
////      return $pdf;
//          $p = PDF::loadView('contract1.index1', compact('pdf'));
//
//      $path = 'public/api/final_contract';
//
//      $fileName =  time(). '.pdf' ;
//      $p->save($path . '/' . $fileName);
//
//      $generated_pdf_link ='public/api/final_contract/'.$fileName;
//      $pdf->final_contract = $generated_pdf_link;
//      $pdf->update();




      $notification = new Notifications();
      $notification->sender_id = $user_id ;
      $notification->receiver_id = $Contracts->user->id;
      $notification->contract_id = $contract_id;

      if ($Contracts->price_details != ""){
          $notification->message = "?????? ?????????? ???????????? ?????? ?????? "
              .$Contracts->code." "
              .$Contracts->price_details." ???????????? ?????? ?????????? ???? "
              .$Contracts->price."  ???????? ??????????";
      }else {
          $notification->message = "???????? ?????????? ?????? ?????? ?????????? ???????????? ?????????? ?????? "
              . $Contracts->code . " ???? "
              . $Contracts->price . "  ???????? ";
      }
//      return $notification->message ;
      $notification->message_type = "0";
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
              "title" => '?????????? ???????? ??????????????????',
              "body" => $notification->message,
          ],
          "notification" => [
              'type' => "notify",
              "title" => '?????????? ???????? ??????????????????',
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
      session()->flash('Add', '???? ?????????? ?????????? ?????????? ');
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

        $work =Contracts::find($id);

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
        session()->flash('Add', '???? ???????????? ?????????? ?????????? ');
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

        session()->flash('success', '???? ?????????? ???????? ???????????????? ?????????? ');

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



        $clearance = Contracts::where('status' , '6')->get();
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
