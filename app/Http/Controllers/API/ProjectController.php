<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Projects;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){

        $projects=Projects::where('status',"1")->get();
        return parent::success($projects);
    }
}
