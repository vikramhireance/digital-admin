<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\BlogResource;
use App\Models\ContactMessage;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Portfolio;
use App\Models\ServiceCategory;
use App\Models\PortfolioCatrgory;
use App\Models\Service;

class PagenameController extends Controller
{
    public function home(Request $request)
    {
        $slider=DB::table('manage_sliders')->get();
        $aboutus=DB::table('manage_about_us')->first();
        $service=DB::table('services')->limit(4)->get();
        $content=DB::table('contents')->first();
        $team=DB::table('teams')->limit(4)->get();
        $statistic=DB::table('statistics')->get();
        

        $blog=Blog::limit(3)->get();
        foreach ($blog as $key => $value) {
            if($value->category){
                $value->category = BlogCategory::whereIn('id',json_decode($value->category))->get();
            }else{
                $value->category = [];
            }
                
        }

        $contact=DB::table('contacts')->get();
        return view('frontend.home',compact('slider','aboutus','service','team','blog','contact','content','statistic'));
    }
    public function page($page)
    {
        if($page == 'home'){
            $slider=DB::table('manage_sliders')->get();
            $aboutus=DB::table('manage_about_us')->first();
            $service=DB::table('services')->limit(4)->get();
            $content=DB::table('contents')->first();
            $team=DB::table('teams')->limit(4)->get();
            $statistic=DB::table('statistics')->get();
            

            $blog=Blog::limit(3)->get();
            foreach ($blog as $key => $value) {
                if($value->category){
                    $value->category = BlogCategory::whereIn('id',json_decode($value->category))->get();
                }else{
                    $value->category = [];
                }
                    
            }

            $contact=DB::table('contacts')->get();
            return view('frontend.home',compact('slider','aboutus','service','team','blog','contact','content','statistic'));
        }
        if($page == 'about-us'){
            $aboutus=DB::table('manage_about_us')->first();
            $team=DB::table('teams')->limit(4)->get();
            $service=DB::table('services')->limit(4)->get();

            return  view('frontend.aboutus',compact('aboutus','service','team'));
        }
        if($page == 'services'){
            $service=DB::table('services')->paginate(8);
            $testimonial=DB::table('testimonials')->get();

            return view('frontend.services',compact('service','testimonial'));
        }
        if($page == 'portfolio'){
            $portfolio=DB::table('portfolios')
            ->select('portfolios.*','portfolio_catrgories.title AS category_name')
            ->join('portfolio_catrgories','portfolio_catrgories.id','portfolios.category')->get();
            $portfolio_category=DB::table('portfolio_catrgories')->get();
            return view('frontend.portfolio',compact('portfolio','portfolio_category'));
        }
        if($page == 'gallery'){
            $images=DB::table('galleries')->where('type','image')->get();
            $videos=DB::table('galleries')->where('type','video')->get();
            return view('frontend.gallery',compact('images','videos'));
        }
        if($page == 'contact-us'){
            $contact=DB::table('contacts')->get();
            return view('frontend.contactus',compact('contact'));
        }
    }
    public function sendmessage(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'name' => 'required',
            'email' => 'required',
            'title' => 'required',
            'message' => 'required',
        ]);

        $msg=new ContactMessage;
        $msg->name=$request->name;
        $msg->email=$request->email;
        $msg->phone=$request->phone;
        $msg->title=$request->title;
        $msg->message=$request->message;
        $msg->save();
        return redirect('/');
    }
    public function services_readmore($id)
    {
        $service=Service::find($id);
       if(!empty($service)){
            if($service->category){
                $service->category = ServiceCategory::whereIn('id',json_decode($service->category))->get();
            }else{
                $service->category = [];
            }
       }
        
        // dd($service);
        return view('frontend.services_readmore',compact('service'));
    }
    public function portfolio_singleview($id)
    {
        $portfolio=DB::table('portfolios')
            ->select('portfolios.*','portfolio_catrgories.title AS category_name')
            ->join('portfolio_catrgories','portfolio_catrgories.id','portfolios.category')
            ->where('portfolios.id',$id)
            ->first();

        return view('frontend.portfolio_singleview',compact('portfolio'));
    }
    public function blog_readmore($id)
    {
        $blog=Blog::find($id);
       if(!empty($blog)){
            if($blog->category){
                $blog->category = BlogCategory::whereIn('id',json_decode($blog->category))->get();
            }else{
                $blog->category = [];
            }
       }
        
        // dd($service);
        return view('frontend.blog_readmore',compact('blog'));
    }
}
