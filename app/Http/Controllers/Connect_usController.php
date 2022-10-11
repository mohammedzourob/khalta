<?php

namespace App\Http\Controllers;

use App\Models\Connect_us;
use App\Models\Work;
use Illuminate\Http\Request;

class Connect_usController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $connect_us =Connect_us::orderBy('id', 'DESC')->get();

      return view('connect_us.connect_us',compact('connect_us'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */

    public function updateviewing(Request $request)
    {
        $id = $request->id;
        $projects = Connect_us::find($id);
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
