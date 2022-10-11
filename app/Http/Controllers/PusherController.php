<?php

namespace App\Http\Controllers;

use App\Models\MyEvent;
use Illuminate\Http\Request;
use Pusher\Pusher;

class PusherController extends Controller
{
    public function push(){
        $options = [
            'cluster' => 'ap2',
            'useTLS' => true
        ];
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
//        event(new MyEvent('hello world'));
        $data ['message']= 'hello world';
        $pusher->trigger('library','all',$data);
    }

}
