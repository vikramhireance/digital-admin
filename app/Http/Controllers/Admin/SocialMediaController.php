<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Social_Media;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;


class SocialMediaController extends Controller
{
    public function social_media(Request $request)
    {
        if ($request->ajax()) {
            $data = Social_Media::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    // ->editColumn('image', function($slider){
                    //     return '<img src="'.URL::to('Services').'/'.$slider->image.'" width="60px">';
                    // })
                    ->addColumn('action', function($data){
                        return view('admin.social_media.social_media_action',compact('data'))->render();
                    })
                    ->rawColumns(['action','image'])
                    ->make(true);
        }
        return view('admin.social_media.social_media_index');
    }

    public function add(Request $request)
    {
        return view('admin.social_media.social_media_add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'social_media_type' => 'required',
            'URL' => 'required',
            
        ]);

        $social_media = new Social_Media;
        $social_media->social_media_type = $request->social_media_type;
        $social_media->URL = $request->URL;
        $social_media->save();
        return redirect('/admin/social_media')->with('success', "Social_Media Added successfully");
    }

    public function edit($id)
    {
        $data = Social_Media::find($id);
        return view('admin.social_media.social_media_edit',compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'social_media_type' => 'required',
            'URL' => 'required',
            
        ]);

        $input['social_media_type'] = $request->social_media_type;
        $input['URL'] = $request->URL;
        
        Social_Media::where('id',$request->id)->update($input);
        return redirect('/admin/social_media')->with('success', "Social_Media Updated successfully");
    }

    public function delete(Request $request)
    {
        $data =Social_Media::where('id', $request->id)->first();

        Social_Media::where('id', $request->id)->delete();
        return response()->json(['status'=>true,'message'=>'"Social_Media deleted successfully"']); 
    }
}
