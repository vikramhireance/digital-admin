<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
use App\Models\Price;

class PricingController extends Controller
{
    public function pricing(Request $request)
    {
        if ($request->ajax()) {
            $data = Price::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                
                    ->addColumn('action', function($data){
                        return view('admin.pricing.action',compact('data'))->render();
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.pricing.pricing_index');
    }

    public function pricing_add(Request $request)
    {
        return view('admin.pricing.pricing_create');
    }
    public function pricing_store(Request $request)
    {
        
        $request->validate([
            'title' => 'required',
            'price' => 'required',
           
        ]);

        $service = new Price;
        $service->title = $request->title;
        $service->price = $request->price;
        $service->save();
        return redirect('/admin/pricing')->with('success', "Pricing Added successfully");
    }

    public function pricing_edit($id)
    {
        $data = Price::find($id);
        return view('admin.pricing.pricing_edit',compact('data'));
    }

    public function pricing_update(Request $request)
    {
        $data = Price::find($request->id);

        $input['title'] = $request->title;
        $input['price'] = $request->price;
      

        Price::where('id',$request->id)->update($input);
        return redirect('/admin/pricing')->with('success', "Pricing Updated successfully");
    }

    public function pricing_delete(Request $request)
    {
     
        $data =Price::where('id', $request->id)->first();
        Price::where('id', $request->id)->delete();
        return response()->json(['status'=>true,'message'=>'"Pricing deleted successfully"']); 
    }
}
