<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Models\Sections;
use App\Models\Special_conditions;
use Illuminate\Http\Request;

class Special_conditionsController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    //special_conditions
      $special_conditions =Special_conditions::all();
      $Projects =Projects::all();

      return view('special_conditions.special_conditions',compact('Projects','special_conditions'));

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
      $validated = $request->validate(Special_conditions::$rules,Special_conditions::$message);

      Special_conditions::create($request->all());

      session()->flash('Add', 'تم اضافة  الملحق بنجاح ');

      return redirect('dashboard/special_conditions');
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
    public function update(Request $request)
    {
        $id=$request->id;
        $validated = $request->validate(Special_conditions::$rules,Special_conditions::$message);
        $special_conditions = Special_conditions::find($id);
        $special_conditions->update($request->all());


        session()->flash('Add', 'تم تعديل الملحق بنجاح ');

        return redirect('dashboard/special_conditions');

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
    public function destroy(Request $request)
    {
        $id = $request->id;


        Special_conditions::find($id)->delete();


        session()->flash('delete','تم حذف السؤال بنجاج');

        return redirect('dashboard/special_conditions');
    }

}

?>
