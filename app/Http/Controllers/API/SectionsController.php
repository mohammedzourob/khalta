<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Projects;
use App\Models\Sections;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    public function index($id){

        $sections=Sections::where('project_id',$id)
            ->where('status',"1")
            ->get();

        return parent::success($sections);
    }
}
