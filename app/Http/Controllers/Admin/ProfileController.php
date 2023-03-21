<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function profile(Request $request)
    {
    
        $data = DB::table('users')->first();
        return view('admin.profile.profile',compact('data'));
    }
    public function updateprofile(Request $request)
    {
        $user = Auth::user();
        
        $input['name'] = $request->name;
        $input['email'] = $request->email;
    
        if ($request->file('image')) {
        
            $file = $request->file('image');
            $filename =date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move(public_path('profile'), $filename);
            $input['image'] = $filename;
        }
        DB::table('users')->where('id', $user->id)->update($input);

        return redirect('/admin/profile')->with('success', "User Info updated successfully");
    }

    public function updatepassword(Request $request)
    {
        
        $user = Auth::user();

        $request->validate([
            'password' => 'required|confirmed|min:6'
        ]);

        $input['password'] = Hash::make($request->password);
        DB::table('users')->where('id', $user->id)->update($input);

        return redirect('/admin/profile')->with('success', "User Password updated successfully");
    }
}
