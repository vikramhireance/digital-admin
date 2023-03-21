<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    public function gallery(Request $request)
    {
        if ($request->ajax()) {
            $data = Gallery::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('image', function ($gallery) {
                    return '<img src="' . URL::to('Upload/Gallery') . '/' . $gallery->image . '" width="60px">';
                })
                ->editColumn('video', function ($gallery) {
                    return '<img src="' . URL::to('Upload/Gallery') . '/' . $gallery->video . '" width="60px">';
                })
                ->addColumn('action', function ($data) {
                    return view('admin.gallery.gallery_action', compact('data'))->render();
                })
                ->rawColumns(['action', 'file'])
                ->make(true);
        }
        return view('admin.gallery.gallery_index');
    }

    public function add(Request $request)
    {
        return view('admin.gallery.gallery_add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            // 'file' => 'required|mimes:jpg,jpeg,png|max:2048',
            // 'video' => 'required|mimes:mp4'

        ]);

        $gallery = new Gallery;
        $gallery->title = $request->title;
        $gallery->type = $request->type;
        if ($request->image) {
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename1 = date('YmdHis') . "." . $file->getClientOriginalExtension();
                $file->move(public_path('Upload/Gallery'), $filename1);
                $gallery->image = $filename1;
            }
        }
        if ($request->video) {
            if ($request->file('video')) {
                $file = $request->file('video');
                $filename2 = date('YmdHis') . "." . $file->getClientOriginalExtension();
                $file->move(public_path('Upload/Gallery'), $filename2);
                $gallery->video = $filename2;
            }
        }
        $gallery->save();
        return redirect('/admin/gallery')->with('success', "Gallery Added successfully");
    }

    public function edit($id)
    {
        $data = Gallery::find($id);
        return view('admin.gallery.gallery_edit', compact('data'));
    }

    public function update(Request $request)
    {

        $input['title'] = $request->title;
        $input['type'] = $request->type;

        if ($request->type == 'image') {
            if ($request->image) {
                if ($request->file('image')) {
                    $data = Gallery::find($request->id);
                    if ($data->image) {
                        $file_path = public_path('Upload/Gallery/') . $data->image;
                        if (file_exists($file_path)) {
                            File::delete($file_path);
                        }
                    }
                    $file = $request->file('image');
                    $filename = date('YmdHis') . "." . $file->getClientOriginalExtension();
                    $file->move(public_path('Upload/Gallery/'), $filename);
                    $input['image']  = $filename;
                }
            }
        }
        if ($request->type == 'video') {
            if ($request->video) {
                if ($request->file('video')) {
                    $data = Gallery::find($request->id);
                    if ($data->video) {
                        $file_path = public_path('Upload/Gallery/') . $data->video;
                        if (file_exists($file_path)) {
                            File::delete($file_path);
                        }
                    }
                    $file = $request->file('video');
                    $filename = date('YmdHis') . "." . $file->getClientOriginalExtension();
                    $file->move(public_path('Upload/Gallery/'), $filename);
                    $input['video']  = $filename;
                }
            }
        }
      


        Gallery::where('id', $request->id)->update($input);
        return redirect('/admin/gallery')->with('success', "GAllery Updated successfully");
    }

    public function delete(Request $request)
    {
        $data = Gallery::where('id', $request->id)->first();
        if ($data->file) {
            $path = public_path('Upload/Gallery/') . $data->file;
            if (file_exists($path)) {
                File::delete($path);
            }
        }

        Gallery::where('id', $request->id)->delete();
        return response()->json(['status' => true, 'message' => '"Gallery deleted successfully"']);
    }
}
