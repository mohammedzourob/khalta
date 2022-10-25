<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contracts;
use App\Models\Work;
use App\Models\Schedule_of_work;
use App\Models\Invoices;
use Illuminate\Support\Facades\Auth;

class SupervisorControlController extends Controller
{

    public function index(){

        $user_id=Auth::user()->id;
        $user=User::where('id',$user_id)->first();

        return parent::success($user);


    }

    public function indexCont(){
        $user_id=Auth::user()->id;
        $data=[
            'contracts'=> Contracts::Where('supervisor', $user_id)->count(),
            'invoices' =>Invoices::Where('user_id', $user_id)->count(),
            'work' =>Work::Where('user_id', $user_id)->count(),
            'schedule of work' =>Schedule_of_work::Where('user_id', $user_id)->count()
        ];



      // return response()->json(['status' => true, 'code' => 200,'contracts'=>$contracts,'invoices'=>$invoices]);

        return parent::success($data);

    }

    public function contract(){
        $user_id=Auth::user()->id;
        $data=[
            'contracts' => Contracts::Where('supervisor', $user_id)->select('id', 'code','id_card_number')->orderBy('id', 'DESC')->get()
        ];

        return parent::success($data);

    }
}
