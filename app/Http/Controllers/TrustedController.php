<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trust;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\DataTables;

class TrustedController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function trusted_by(Request $request)
    {
        if ($request->ajax()) {
            $data = Trust::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('image', function ($slider) {
                    return '<img src="' . URL::to('Trusted') . '/' . $slider->image . '" width="60px">';
                })
                ->addColumn('action', function ($data) {
                    return view('admin.trust.action', compact('data'))->render();
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }
        return view('admin.trust.trust_index');
    }
    public function add()
    {
        return view('admin.trust.trust_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'review' => 'required',
        ]);

        $trusted_by = new Trust;
        $trusted_by->review = $request->review;
        $trusted_by->image = $request->image;
      
      
        if ($request->file('image')) {

            $file = $request->file('image');
            $filename = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move(public_path('Trusted'), $filename);
            $trusted_by->image = $filename;
        }
        $trusted_by->save();
        return redirect('/admin/trusted_by')->with('success', "Trusted By Added successfully");
    }
    public function edit($id)
    {
        $data = Trust::find($id);
        return view('admin.trust.trust_edit',compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'review' => 'required',
        ]);

        $data['title'] = $request->title;
        $data['review'] = $request->review;
      
        if($request->image){
            $slider = Trust::where('id', $request->id)->first();
            if ($request->file('image')) {
                if ($slider->image) {
                    $image_path = public_path('Trusted/') . $slider->image;
                    if (file_exists($image_path)) {
                        File::delete($image_path);
                    }
                }
                $file = $request->file('image');
                $filename = date('YmdHis') . "." . $file->getClientOriginalExtension();
                $file->move(public_path('Trusted'), $filename);
                $data['image'] = $filename;
            }
        }
        Trust::where('id', $request->id)->update($data);
        return redirect('/admin/trusted_by')->with('success', "Trusted By updated successfully");
    }

    public function delete(Request $request)
    {
        $slider = Trust::where('id', $request->id)->first();
        if ($slider->image) {
            $image_path = public_path('Trusted/') . $slider->image;
            if (file_exists($image_path)) {
                File::delete($image_path);
            }
        }

        Trust::where('id', $request->id)->delete();
        return response()->json(['status' => true, 'message' => '"Slider deleted successfully"']);
    }
}
