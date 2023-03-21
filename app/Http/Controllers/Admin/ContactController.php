<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;


class ContactController extends Controller
{
    public function contact(Request $request)
    {
        if ($request->ajax()) {
            $data = Contact::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    // ->editColumn('image', function($slider){
                    //     return '<img src="'.URL::to('Services').'/'.$slider->image.'" width="60px">';
                    // })
                    ->addColumn('action', function($data){
                        return view('admin.contact.contact_action',compact('data'))->render();
                    })
                    ->rawColumns(['action','image'])
                    ->make(true);
        }
        return view('admin.contact.contact_index');
    }

    public function add(Request $request)
    {
        return view('admin.contact.contact_add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'email' => 'required',
            'address_title' => 'required',
            'address_details' => 'required',
            
        ]);

        $conatct = new Contact;
        $conatct->phone = $request->phone;
        $conatct->address_title = $request->address_title;
        $conatct->email = $request->email;
        $conatct->address_details = $request->address_details;
        // $conatct->slug = Str::slug($request->phone);
        $conatct->save();
        return redirect('/admin/contact')->with('success', "Contact Added successfully");
    }

    public function edit($id)
    {
        $data = Contact::find($id);
        $categories = ServiceCategory::get();
        return view('admin.contact.contact_edit',compact('data','categories'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'email' => 'required',
            'address_title' => 'required',
            'address_details' => 'required',
            
        ]);

        $input['phone'] = $request->phone;
        $input['email'] = $request->email;
        $input['address_title'] = $request->address_title;
        $input['address_details'] = $request->address_details;
        // $input['slug'] = Str::slug($request->phone);

        Contact::where('id',$request->id)->update($input);
        return redirect('/admin/contact')->with('success', "Contact Updated successfully");
    }

    public function delete(Request $request)
    {
        $data =Contact::where('id', $request->id)->first();

        Contact::where('id', $request->id)->delete();
        return response()->json(['status'=>true,'message'=>'"Contact deleted successfully"']); 
    }
}
