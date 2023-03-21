<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\Facades\DataTables;

class SettingsController extends Controller
{
    public function menu(Request $request)
    {
        $data = Menu::orderBy('order', 'asc')->get();
        return view('admin.menu.menu_index', compact('data'));
    }

    public function updateMenu(Request $request)
    {
        foreach ($request->input as $key => $value) {
            $input['order'] = $key+1;
            Menu::where('id',$value)->update($input);
        }
        return json_encode(true);
    }
}
