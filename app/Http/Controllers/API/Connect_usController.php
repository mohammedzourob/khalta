<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Connect_us;
use App\Models\Contracts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Connect_usController extends Controller
{


    public function store(Request $request)
    {

        $validation = Validator::make($request->all(),Connect_us::$rules);
        if ($validation->fails()){
            return parent::error( $validation->errors());
        }
        $connect_us = Connect_us::create($request->all());

         return parent::success( $connect_us);

    }
}
