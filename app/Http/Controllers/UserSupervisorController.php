<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data =User::where('type',2)->get();
//        return $data;

        return view('users_supervisor.index',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users_supervisor.create');
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
        $users = new User();
        $users->type = request('type');
        $users->name = request('name');
        $users->email = request('email');
        $users->password = request('password');
        $users->Status = request('Status');
        $users->City = request('City');
        $users->phone = request('phone');

        if ($request->file('image') ) {
            $name = Str::random(12);
            $path = $request->file('image')->move('users_image',
                $name . time() . '.' . $request->file('image')->getClientOriginalExtension());
            $users->image= $path;
        }
        $users->save();
        session()->flash('Add', 'تم اضافة المستخدم بنجاح ');
        return redirect('dashboard/user_supervisor');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return view('users_supervisor.edit',compact('user'));
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


        session()->flash('success', 'تم تعديل المشرف بنجاح ');

        return redirect('dashboard/user_supervisor');
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

        return redirect('dashboard/user_supervisor');
    }
}
