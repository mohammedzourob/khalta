<?php

namespace App\Http\Controllers;

use App\Mail\verificationMail;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send(){

        try {
            $user= User::findOrFail(1);
            Mail::to($user)->send(new verificationMail());
         }catch (ModelNotFoundException $modelNotFoundException){
            return "user not found";
        }
    }
}
