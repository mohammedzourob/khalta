<?php

namespace App\Http\Controllers;
use App\Models\Ads;
use App\Models\Answers;
use App\Models\Special_conditions;
use Illuminate\Http\Request;

class AnswersController extends Controller
{
    public function index($id){

        $answers=Answers::where('question_id',$id)->get();
        $special_conditions =Special_conditions::where('id',$id)->first();
        return view('answers.answers',compact('answers','special_conditions'));

    }

    public function store(Request $request)
    {
        $validated = $request->validate(Answers::$rules);

        Answers::create($request->all());

        session()->flash('Add', 'تم اضافة  الجواب  بنجاح ');

        return redirect()->back();
    }
    public function update(Request $request)
    {
//        $validated = $request->validate(Answers::$rules);
        $id = $request->id;
        $answers = Answers::find($id);
        $answers->update($request->all());
        session()->flash('Add', 'تم تعديل  الجواب  بنجاح ');

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        Answers::find($id)->delete();
        session()->flash('delete','تم حذف العنصر بنجاج');
        return redirect()->back();

    }

}
