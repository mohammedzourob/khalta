<?php

namespace App\Http\Controllers;

use App\Models\About_us;
use App\Models\Answers_special_conditions;
use App\Models\Contracts;
use Illuminate\Http\Request;

class Answers_special_conditionsController extends Controller
{
    public function index($id)
    {
        $answers =Answers_special_conditions::where('contract_id',$id)->get();
//        $code =Answers_special_conditions::where('contract_id',$id)->first();
        $code =Contracts::find($id);
//        return $code;

        return view('answers_special_conditions.answers_special_conditions',compact('answers','code'));
    }
}
