<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\URL;
use App\Models\HeaderImage;
use Illuminate\Support\Facades\File;

class HeaderImageController extends Controller
{
    //
    public function header_image(Request $request)
    {
    
        $data = DB::table('header_image')->first();
        return view('admin.header_image.header_image',compact('data'));
    }
    public function updateheader_image(Request $request)
    {
        $data['page'] = $request->page;
        if($request->aboutus){
            $about = HeaderImage::where('page','aboutus')->first();
            if(!empty($about)){
                if($about->image){
                    $image_path = public_path('Header_image/').$about->image;
                    if(file_exists($image_path)){
                        File::delete($image_path);
                    }
                }
                if ($request->file('aboutus')) {
                    $file = $request->file('aboutus');
                    $filename ='aboutus' . "." . $file->getClientOriginalExtension();
                    $file->move(public_path('Header_image'), $filename);
                    $imput['image'] = $filename;
                    HeaderImage::where('page','aboutus')->update($imput);
                }
            }
           
        }
       
      
       
        $about=DB::table('header_image')->first();
        DB::table('header_image')->where('id', $about->id)->update($data);
        return redirect('/admin/header_image')->with('success', "About Us updated successfully");
        return response()->json(['status'=>true,'message'=>'"About Us updated successfully"']);   
    }
}
