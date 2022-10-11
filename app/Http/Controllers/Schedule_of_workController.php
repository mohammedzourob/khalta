<?php

namespace App\Http\Controllers;

use App\Models\Schedule_of_work;
use App\Models\Work;
use Illuminate\Http\Request;

class Schedule_of_workController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      //schedule_of_work
      $schedule_of_work = Schedule_of_work::orderBy('id', 'DESC')->get();

      return view('schedule_of_work.schedule_of_work',compact('schedule_of_work'));

  }
//    public function updateStatus(Request $request)
//    {
////        return $request->all();
//        $id = $request->id;
//        $projects = Work::find($id);
//        $projects->viewing_status = request('viewing_status');
//        $projects->status = request('status');
//        $projects->update();
//
//        session()->flash('success', 'تم تعديل حالة العمل بنجاح ');
//
//        return redirect('dashboard/work');
//
//
//    }

    public function updateviewing(Request $request)
    {
        $id = $request->id;
        $projects = Schedule_of_work::find($id);
        $projects->viewing_status = request('viewing_status');
        $projects->update();
        return response()->json([
            'employees' => $projects->viewing_status,
            'id' => $projects->id,

        ]);
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
