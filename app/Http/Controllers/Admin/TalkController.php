<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TalkController extends Controller
{ public function talk(Request $request)
    {
    
        $data = DB::table('talktous')->first();
        // return view('admin.aboutus.about_us',compact('data'));
        return view('admin.talkus.talk_us',compact('data'));
    }
    public function updatetalk(Request $request)
    {
       
   
        $data['title'] = $request->title;
        $data['description'] = $request->description;
      
        $about=DB::table('talktous')->first();
        DB::table('talktous')->where('id', $about->id)->update($data);
        return redirect('/admin/talk')->with('success', "Talk To Us updated successfully");
        return response()->json(['status'=>true,'message'=>'"Talk To Us updated successfully"']);   
    }
}
