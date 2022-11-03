<?php

namespace App\Http\Controllers;

use App\Models\Occupation;
use App\Models\Projects;
use App\Models\Sections;
use Illuminate\Http\Request;

class SectionsController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $sections =Sections::all();
      $Projects =Projects::all();

      return view('sections.sections',compact('Projects','sections'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
//
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
//        return $request->all();
      $validated = $request->validate(Sections::$message);

      Sections::create($request->all());

      session()->flash('Add', 'تم اضافة القسم بنجاح ');

      return redirect('dashboard/sections');
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
      $validated = $request->validate(Sections::$rules_edit,Sections::$message);
      $sections = Sections::find($id);
      $sections->update($request->all());


      session()->flash('Add', 'تم تعديل القسم بنجاح ');

      return redirect('dashboard/sections');
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


        Sections::find($id)->delete();


        session()->flash('delete','تم حذف القسم بنجاج');

        return redirect('dashboard/sections');
  }



}

?>
