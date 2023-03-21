<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $slider=DB::table('manage_sliders')->get();
       return view('frontend.home',compact('slider'));
    }
}
