<?php

namespace App\Http\Controllers;

use App\Models\Connect_us;
use App\Models\Contracts;
use App\Models\Invoices;
use App\Models\Notifications;
use App\Models\User;
use Carbon\Carbon;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $range = \Carbon\Carbon::now()->subDays(30);



//        $Invoices=Invoices::where('viewing_status','0')->count();
//        return $Invoices;
        $Connect_us= Connect_us::orderBy('id', 'DESC')->get();
        $mytime = Carbon::now()->addHours(2);
//        return $mytime;
        $contract=Contracts::wheredate('created_at',$mytime)->count();
        $contractall=Contracts::orderBy('id', 'DESC')->get();
        $contractcont=Contracts::count();


        return view('index',compact('Connect_us','contract','contractcont','contractall'));
    }

}
