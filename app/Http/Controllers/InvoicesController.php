<?php

namespace App\Http\Controllers;

use App\Models\Contracts;
use App\Models\Invoices;
use App\Models\Notifications;
use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InvoicesController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    //invoices
//      ->where('name','like', '%'.$value.'%')
      $invoices =Invoices::orderBy('id', 'DESC')->get();
//      $notifications =Notifications::where('message','like', '%'.'فاتورة'.'%')->get();
//      return $notifications;
      return view('invoices.invoices',compact('invoices'));

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function cout()
  {

  }

    public function updateStatus(Request $request)
    {
//        return $request->all();
        $id = $request->id;
        $projects = Invoices::find($id);
        $projects->viewing_status = request('viewing_status');
        $projects->status = request('status');
        $projects->update();

        session()->flash('success', 'تم تعديل حالة الفاتورة بنجاح ');

        return redirect('dashboard/invoices');


    }

    public function updateviewing(Request $request)
    {
        $id = $request->id;
        $projects = Invoices::find($id);
        $projects->viewing_status = request('viewing_status');
        $projects->update();
        return response()->json([
            'employees' => $projects->viewing_status,
            'id' => $projects->id,

        ]);
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
