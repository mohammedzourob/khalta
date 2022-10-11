<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\About_us;

use Illuminate\Http\Request;

class About_usController extends Controller
{
    public function index(){

        $projects=About_us::find(1);

        return parent::success($projects);
    }
}
