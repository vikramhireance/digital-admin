<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\URL;

class AboutUsController extends Controller
{
    //
    public function aboutus(Request $request)
    {
    
        $data = DB::table('manage_about_us')->first();
        return view('admin.aboutus.about_us',compact('data'));
    }
    public function updateaboutus(Request $request)
    {
       
   
        $data['title'] = $request->title;
        $data['sub_title'] = $request->sub_title;
        $data['description'] = $request->description;
      
        if ($request->file('image')) {
           
            $file = $request->file('image');
            $filename =date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move(public_path('AboutUs'), $filename);
            $data['image'] = $filename;
        }
      
       
        $about=DB::table('manage_about_us')->first();
        DB::table('manage_about_us')->where('id', $about->id)->update($data);
        return redirect('/admin/about_us')->with('success', "About Us updated successfully");
        return response()->json(['status'=>true,'message'=>'"About Us updated successfully"']);   
    }
}
