<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManageSlider;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\DataTables;


class SliderController extends Controller
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
    public function slider(Request $request)
    {
        if ($request->ajax()) {
            $data = ManageSlider::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('image', function ($slider) {
                    return '<img src="' . URL::to('Image') . '/' . $slider->image . '" width="60px">';
                })
                ->addColumn('action', function ($data) {
                    return view('admin.slider.action', compact('data'))->render();
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }
        return view('admin.slider.slider_index');
    }
    public function add()
    {
        return view('admin.slider.slider_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'image' => 'required',
            'button_text' => 'required',
            'button_url' => 'required',
        ]);

        $slider = new ManageSlider;
        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->image = $request->image;
        $slider->button_text = $request->button_text;
        $slider->button_url = $request->button_url;
        if ($request->file('image')) {

            $file = $request->file('image');
            $filename = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move(public_path('Image'), $filename);
            $slider->image = $filename;
        }
        $slider->save();
        return redirect('/admin/slider')->with('success', "Slider Added successfully");
    }
    public function edit($id)
    {
        $data = ManageSlider::find($id);
        return view('admin.slider.slider_edit',compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'button_text' => 'required',
            'button_url' => 'required',
        ]);

        $data['title'] = $request->title;
        $data['subtitle'] = $request->subtitle;
        $data['button_text'] = $request->button_text;
        $data['button_url'] = $request->button_url;
        if($request->image){
            $slider = ManageSlider::where('id', $request->id)->first();
            if ($request->file('image')) {
                if ($slider->image) {
                    $image_path = public_path('Image/') . $slider->image;
                    if (file_exists($image_path)) {
                        File::delete($image_path);
                    }
                }
                $file = $request->file('image');
                $filename = date('YmdHis') . "." . $file->getClientOriginalExtension();
                $file->move(public_path('Image'), $filename);
                $data['image'] = $filename;
            }
        }
        ManageSlider::where('id', $request->id)->update($data);
        return redirect('/admin/slider')->with('success', "Slider updated successfully");
    }

    public function delete(Request $request)
    {
        $slider = ManageSlider::where('id', $request->id)->first();
        if ($slider->image) {
            $image_path = public_path('Image/') . $slider->image;
            if (file_exists($image_path)) {
                File::delete($image_path);
            }
        }

        ManageSlider::where('id', $request->id)->delete();
        return response()->json(['status' => true, 'message' => '"Slider deleted successfully"']);
    }
}
