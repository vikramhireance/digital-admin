<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use App\Models\ManageSlider;
use App\Models\Price;
use App\Models\PricingItem;
use App\Models\Service;
use App\Models\Talk;
use App\Models\Team;
use App\Models\Testimonials;
use App\Models\UsefulLinks;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function slider()
    {
        $slider = ManageSlider::all();
        $data['data'] = $slider;
        $data['success'] = true;
        $data['message'] = "Slider Data Retrived Success";


        return response()->json($data);
    }
    public function aboutus()
    {
        $about = DB::table('manage_about_us')->get();
        $data['data'] = $about;
        $data['success'] = true;
        $data['message'] = "About Us Data Retrived Success";
        return response()->json($data);
    }
    public function team()
    {
        $team = Team::all();
        $data['data'] = $team;
        $data['success'] = true;
        $data['message'] = "Team Data Retrived Success";
        return response()->json($data);
    }


    public function service_list()
    {
        $service = Service::all();
        $data['data'] = $service;
        $data['success'] = true;
        $data['message'] = "Service Data Retrived Success";
        return response()->json($data);
    }
    public function service_details(Request $request, $id)
    {
        $service = Service::find($id);
        if (!empty($service)) {
            if ($service->category) {
                $service->category = ServiceCategory::whereIn('id', json_decode($service->category))->get();
            } else {
                $service->category = [];
            }
        }

        return response()->json($service);
    }
    public function service_category_details()
    {

        $service = ServiceCategory::all();
        $data['data'] = $service;
        $data['success'] = true;
        $data['message'] = "Service Category Details";
        return response()->json($data);
    }
    public function talk_to_us()
    {

        $tal_to = Talk::all();
        $data['data'] = $tal_to;
        $data['success'] = true;
        $data['message'] = "Talk to us Data Retrived";
        return response()->json($data);
    }
    public function pricing()
    {

        $tal_to = Price::all();
        $data['data'] = $tal_to;
        $data['success'] = true;
        $data['message'] = "Price Data Retrived";
        return response()->json($data);
    }
    public function pricing_items()
    {

        $tal_to = PricingItem::all();
        $data['data'] = $tal_to;
        $data['success'] = true;
        $data['message'] = "Price Items Data Retrived";
        return response()->json($data);
    }
    public function testimonial_details()
    {

        $tal_to = Testimonials::all();
        $data['data'] = $tal_to;
        $data['success'] = true;
        $data['message'] = "Testimonials Detail Data Retrived";
        return response()->json($data);
    }
    public function useful_links($page_name)
    {
        $link=DB::table('useful_links')->where('page_name',$page_name)->first();
        $data['data'] = $link;
        $data['success'] = true;
        $data['message'] = "successfully";
        return response()->json($data);
    }
}
