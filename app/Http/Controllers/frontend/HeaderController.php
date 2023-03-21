<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class HeaderController extends Controller
{
    public function menu(){

        $menu=Menu::get();
        return view('frontend.main.header',compact('menu'));
    }
}
