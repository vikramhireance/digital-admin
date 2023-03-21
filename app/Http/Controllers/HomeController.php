<?php

namespace App\Http\Controllers;

use App\Models\ManageSlider;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\ContactMessage;

class HomeController extends Controller
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
    public function index()
    {
        if (auth()->user()->type == 'admin') {
            return view('admin.dashboard');
        } else if (auth()->user()->type == 'manager') {
            return view('home');
        } else {
            return view('home');
        }
    }
    public function adminHome()
    {
        $services = Service::count();
        $portfolio = Portfolio::count();
        $messages = ContactMessage::count();
        return view('admin.dashboard',compact('services','portfolio','messages'));
    }
    public function adminLogout()
    {

        Auth::logout();
        Session::flush();
        return redirect()->route('adminLogin');
    }
    public function slider()
    {

        $sliders = ManageSlider::all();
        return view('admin.slider.slider_index',compact('sliders'));
    }
    public function dashboard()
    {

        return view('admin.dashboard');
    }
    public function addslider(Request $request)
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
            $filename =date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move(public_path('Image'), $filename);
            $slider->image = $filename;
        }
        $slider->save();
        return redirect('/admin/slider')->with('success', "Slider Added successfully");
    }
    public function editslider(Request $request)
    {
        $siders = ManageSlider::find($request->id);
        return response()->json(['status'=>true,'data'=>$siders]);
    }

    public function updateslider(Request $request)
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

        $id =ManageSlider::where('id', $request->id)->first();

        // if ($request->hasFile('image')) {
        //     $image_path = public_path('Image/').$id->image;
        //     if(file_exists($image_path)){
        //         File::delete($image_path);
        //     }

        //     $filename = $request->file('image');
        //     $file = date('YmdHis').".".$filename->getClientOriginalExtension();
        //     $filename->move(public_path('Image/'), $file);
        //     $data['image'] = $file;
        // }

        ManageSlider::where('id', $request->id)->update($data);
        return response()->json(['status'=>true,'message'=>'"Slider updated successfully"']);   
    }
    
    public function deleteslider(Request $request)
    {
        $slider =ManageSlider::where('id', $request->id)->first();
        if($slider->image){
            $image_path = public_path('Image/').$slider->image;
            if(file_exists($image_path)){
                File::delete($image_path);
            }
        }

        ManageSlider::where('id', $request->id)->delete();
        return response()->json(['status'=>true,'message'=>'"Slider deleted successfully"']); 
    }
}
