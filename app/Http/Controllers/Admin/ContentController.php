<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{
    public function contents(Request $request)
    {
        $data = DB::table('contents')->first();
        return view('admin.contents.content_index',compact('data'));
    }
    public function update(Request $request)
    {
        $data = Content::find($request->id);
        $input['title'] = $request->title;
        $input['mission_title'] = $request->mission_title;
        $input['description'] = $request->description;
        $input['mission_description'] = $request->mission_description;
        $input['vision_title'] = $request->vision_title;
        $input['vision_description'] = $request->vision_description;
   
       if(($request->image))
       {
        if ($request->file('image')) {
            if($data->image){
                $image_path = public_path('Content/').$data->image;
                if(file_exists($image_path)){
                    File::delete($image_path);
                }
            }
            $file = $request->file('image');
            $filename1 =date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move(public_path('Content'), $filename1);
            $input['image']= $filename1;
        }
       }
       
       if(($request->vision_image))
       {
        if ($request->file('vision_image')) {
            if($data->vision_image){
                $image_path1 = public_path('Content/').$data->vision_image;
                if(file_exists($image_path1)){
                    File::delete($image_path1);
                }
            }
            $file = $request->file('vision_image');
            $filename2 =date('YmHis') . "." . $file->getClientOriginalExtension();
            $file->move(public_path('Content'), $filename2);
            $input['vision_image'] = $filename2;
        }
    }
    if(($request->mission_image))
    {
        if ($request->file('mission_image')) {
            if($data->mission_image){
                $image_path2 = public_path('Content/').$data->mission_image;
                if(file_exists($image_path2)){
                    File::delete($image_path2);
                }
            }
            $file = $request->file('mission_image');
            $filename3 =date('YHis') . "." . $file->getClientOriginalExtension();
            $file->move(public_path('Content'), $filename3);
            $input['mission_image']= $filename3;
        }
    }

        Content::find($request->id)->update($input);
        return redirect('admin/contents')->with('success', "Content Updated successfully");
    }

}
