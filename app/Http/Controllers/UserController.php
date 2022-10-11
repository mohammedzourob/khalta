<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {

//        $data =User::orderBy('id','DESC')->paginate(5);
        $admin =User::where('type',1)->get();
//        return $data;

        return view('users_admin.index',compact('admin'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users_admin.create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request->all();

            $validated = $request->validate(User::$rules);


        $request['password']= Hash::make($request->input('password'));
        $user = User::create($request->all());
//        $user->attachRole(1,$user->id);


        session()->flash('success', 'تم اضافة المستخدم بنجاح ');

        return redirect('dashboard/users_admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

//        $user =User::find($id);
//
//        return view('users_admin.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
//        $roles = Role::pluck('name','name')->all();
//        $userRole = $user->roles->pluck('name','name')->all();
        return view('users_admin.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validated = $request->validate(User::$rules_update);

        $users = User::find($id);

        $users->update( $request->all());


            session()->flash('success', 'تم تعديل المستخدم بنجاح ');

        return redirect('dashboard/users_admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;


        User::find($id)->delete();


            session()->flash('delete','تم حذف المستخدم بنجاج');

        return redirect('dashboard/users_admin');

    }
}
