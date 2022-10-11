<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Bond;
use App\Models\Invoices;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BondController extends Controller
{
    public function store(Request $request)
    {

        $validation = Validator::make($request->all(), Bond::$rules);
        if ($validation->fails()) {
            return parent::error($validation->errors());
        }

        $bond = new Bond();
        $bond->contract_number = request('contract_number');
        $bond->supervisor_name = request('supervisor_name');
        $bond->exchange_amount = request('exchange_amount');
        $bond->exchange_reason = request('exchange_reason');
        $bond->date_of_application = request('date_of_application');

        $bond->save();

        return parent::success($bond);
    }
}
