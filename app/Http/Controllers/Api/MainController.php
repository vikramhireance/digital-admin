<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Contact;
use App\Models\ContactMessage;
use App\Models\EmailSubscriber;
use App\Models\Gallery;
use App\Models\General_Settings;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use App\Models\ManageSlider;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Team;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function slider()
    {
        $data = ManageSlider::all();
        return response()->json($data);
    }
    public function aboutus()
    {
        $data = DB::table('manage_about_us')->get();
        return response()->json($data);
    }
    public function team()
    {
        $data = Team::all();
        return response()->json($data);
    }
    public function gallery()
    {
        $data = Gallery::all();
        return response()->json($data);
    }
    public function contact()
    {
        $data = Contact::all();
        return response()->json($data);
    }
    public function general_settings()
    {
        $data = General_Settings::all();
        return response()->json($data);
    }
    public function service_list()
    {
        $data = Service::all();
        return response()->json($data);
    }
    public function service_details(Request $request,$id)
    {
        $service=Service::find($id);
        if(!empty($service)){
             if($service->category){
                 $service->category = ServiceCategory::whereIn('id',json_decode($service->category))->get();
             }else{
                 $service->category = [];
             }
        }
        return response()->json($service);
    }
    public function portfolio_list()
    {
        $data = Portfolio   ::all();
        return response()->json($data);
    }
    public function portfolio_details($id)
    {
        $portfolio=DB::table('portfolios')
        ->select('portfolios.*','portfolio_catrgories.title AS category_name')
        ->join('portfolio_catrgories','portfolio_catrgories.id','portfolios.category')
        ->where('portfolios.id',$id)
        ->first();
        return response()->json($portfolio);
    }
    public function blog_list()
    {
        $data = Blog::all();
        return response()->json($data);
    }
    public function blog_details($id)
    {
        $blog=Blog::find($id);
        if(!empty($blog)){
             if($blog->category){
                 $blog->category = BlogCategory::whereIn('id',json_decode($blog->category))->get();
             }else{
                 $blog->category = [];
             }
        }
        return response()->json($blog);
    }
    public function message_submit(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'name' => 'required',
            'email' => 'required',
            'title' => 'required',
            'message' => 'required',
        ]);

        $conatct = new ContactMessage();
        $conatct->phone = $request->phone;
        $conatct->name = $request->name;
        $conatct->title = $request->title;
        $conatct->email = $request->email;
        $conatct->message = $request->message;
        $conatct->save();
        $response = [
            'success' => true,
            'message' => 'Message Submited Successfully..',
        ];

        return response()->json($response);
    }
    public function newsletter_submit(Request $request)
    {
        $request->validate([
            'email'=>'required|unique:email_subscribers',
        ]);

        $data=new EmailSubscriber();
        $data->email = $request->email;
        $data->save();

        $response = [
            'success' => true,
            'message' => 'News Letters Submited Successfully..',
        ];

        return response()->json($response);
    }
}
