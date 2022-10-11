<?php

namespace App\Http\Controllers;


use App\Models\Occupation;
use App\Models\Projects;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectsController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $occupation =Projects::all();
      return view('projects.projects',compact('occupation'));
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

      $validated = $request->validate(Projects::$rules,Projects::$message_ar);
      $projects = new Projects();
      $projects->type = request('type');
      $projects->name = request('name');
      $projects->status = request('status');

      if ($request->file('icon') ) {
          $name = Str::random(12);
          $path = $request->file('icon')->move('api\logo',
              $name . time() . '.' . $request->file('icon')->getClientOriginalExtension());
          $projects->icon= $path;
      }

      $projects->save();
      session()->flash('Add', 'تم اضافة المشروع بنجاح ');
      return redirect('dashboard/projects');
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


      $id = $request->id;
      $validated = $request->validate(Projects::$rules_edit,Projects::$message_ar);
//      $sections = Projects::find($id);
//      $sections->update($request->all());
      $projects = Projects::find($id);
      $projects->type = request('type');
      $projects->name = request('name');
      $projects->status = request('status');

      if ($request->file('icon') ) {
          $name = Str::random(12);
          $path = $request->file('icon')->move('api\logo',
              $name . time() . '.' . $request->file('icon')->getClientOriginalExtension());
          $projects->icon= $path;
      }
      $projects->update();
      session()->flash('Add', 'تم تعديل المشروع بنجاح ');
      return redirect('dashboard/projects');

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


        Projects::find($id)->delete();


        session()->flash('delete','تم حذف المشروع بنجاج');

        return redirect('dashboard/projects');
  }

}

?>
