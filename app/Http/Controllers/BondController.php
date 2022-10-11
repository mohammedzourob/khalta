<?php

namespace App\Http\Controllers;

use App\Models\Bond;
use App\Models\Work;
use Illuminate\Http\Request;

class BondController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $bond =Bond::orderBy('id', 'DESC')->get();

      return view('bond.bond',compact('bond'));
  }
    public function updateviewing(Request $request)
    {
        $id = $request->id;
        $projects = Bond::find($id);
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
