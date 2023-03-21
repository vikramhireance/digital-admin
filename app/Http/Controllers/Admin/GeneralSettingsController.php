<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\URL;

class GeneralSettingsController extends Controller
{
    //
    public function general_settings(Request $request)
    {

        $data = DB::table('general_settings')->first();
        return view('admin.general_settings.general_settings', compact('data'));
    }
    public function updategeneral_settings(Request $request)
    {


        $data['website_title'] = $request->website_title;
        $data['website_description'] = $request->website_description;
        $data['live_mode'] = $request->live_mode;
        if (!$request->live_mode) {
            $data['live_mode'] = 0;
        }
        $data['primary_color'] = $request->primary_color;
        $data['chat_gpt_api_key'] = $request->chat_gpt_api_key;
        $data['dark_primary_color'] = $request->dark_primary_color;
        $data['secondary_color'] = $request->secondary_color;
        $data['dark_secondary_color'] = $request->dark_secondary_color;
        $data['website_type'] = $request->website_type;
        $data['copyright_text'] = $request->copyright_text;
        $data['office_hours'] = $request->office_hours;

        $data['dark_mode'] = $request->dark_mode;
        if (!$request->dark_mode) {
            $data['dark_mode'] = 0;
        }

        if ($request->file('light_logo')) {

            $file = $request->file('light_logo');
            $filename = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move(public_path('General_settings/light_logo'), $filename);
            $data['light_logo'] = $filename;
        }
        if ($request->file('dark_logo')) {

            $file = $request->file('dark_logo');
            $filename = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move(public_path('General_settings/dark_logo'), $filename);
            $data['dark_logo'] = $filename;
        }
        if ($request->file('mobile_logo')) {

            $file = $request->file('mobile_logo');
            $filename = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move(public_path('General_settings/mobile_logo'), $filename);
            $data['mobile_logo'] = $filename;
        }
        if ($request->file('favicon')) {

            $file = $request->file('favicon');
            $filename = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move(public_path('General_settings/favicon'), $filename);
            $data['favicon'] = $filename;
        }


        $about = DB::table('general_settings')->first();
        DB::table('general_settings')->where('id', $about->id)->update($data);
        return redirect('/admin/general_settings')->with('success', "general_settings updated successfully");
        return response()->json(['status' => true, 'message' => '"general_settings updated successfully"']);
    }
}
