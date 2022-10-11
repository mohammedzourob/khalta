<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Answers_special_conditions;
use App\Models\Career_days;
use App\Models\Projects;
use App\Models\Sections;
use App\Models\Special_conditions;
use App\Models\Work;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Special_conditionsController extends Controller
{
    public function index($id)
    {
        if ($id == 1 or $id == 2 or $id == 3 or$id == 4) {
            $special_conditions = Special_conditions::where('project_id', 1)->with('answers')->get();
            return parent::success($special_conditions);
        }
        $special_conditions = Special_conditions::where('project_id', 5)->with('answers')->get();
        return parent::success($special_conditions);
    }

    public function store(Request $request)
    {
        $tracks = $request->data;
        foreach ($tracks as $track) {
            Answers_special_conditions::create($track);
    }

//        return $request->data;
//        return parent::success($request->all());
//        $validation = Validator::make($request->all(),Answers_special_conditions::$rules);
//        if ($validation->fails()){
//            return parent::error( $validation->errors());
//        }
//        return $request->contract_id;
            $datt=[];
//            if (count($request->data) > 0) {
//                foreach ($request->data as $data) {
//                    Answers_special_conditions::create(array($data));
//                    $container = new Answers_special_conditions([
//                        'contract_id' =>$request->get('contract_id'),
//                        'question_id' => $request->get('question_id'),
//                        'answers' => $request->get('answers')
//                    ]);
//
//                    $container->save();
//                    $bond = new Answers_special_conditions();
//                    $datt[]= $request->data[0]->contract_id;
//                    $bond->question_id = request('question_id');
//                    $bond->answers = request('answers');
//                    $bond->save();
//                    $request->contract_id = $v->contract_id;
//                       $v->question_id = $request->question_id;
//                       $v->answers = $request->answers;

//                        'question_id' => $v->question_id,
//                        'answers' => $v->answers,
//                    ];
//                    Answers_special_conditions::insert($v);
//                }
//            }


        return parent::success($tracks);
    }
}
