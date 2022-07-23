<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function sendNotification(){
        return view('notification.sendnotification');
    }
}
