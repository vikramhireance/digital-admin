<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage;

class MessageController extends Controller
{
    function sendmessage(Request $request)
    {
        $msg=new ContactMessage;
        $msg->name=$request->name;
        $msg->email=$request->email;
        $msg->phone=$request->phone;
        $msg->title=$request->title;
        $msg->message=$request->message;
        $msg->save();
        return redirect('/');

    }
}
