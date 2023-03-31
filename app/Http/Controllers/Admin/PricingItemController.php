<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Price;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\PricingItem;

class PricingItemController extends Controller
{
    public function pricing_items(Request $request)
    {
        if ($request->ajax()) {
            $data = PricingItem::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                
                    ->addColumn('action', function($data){
                        return view('admin.price_item.action',compact('data'))->render();
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.price_item.item_index');
    }

    public function pricing_items_add(Request $request)
    {
        $pricing = Price::all();
      
        return view('admin.price_item.item_create',compact('pricing'));
    }
    public function pricing_items_store(Request $request)
    {
        
        $request->validate([
            'title' => 'required',
            'price_id' => 'required',
            'status' => 'required',
           
        ]);

        $service = new PricingItem;
        $service->title = $request->title;
        $service->price_id = $request->price_id;
        $service->status = $request->status;
        $service->save();
        return redirect('/admin/pricing_items')->with('success', "Pricing Items Added successfully");
    }

    public function pricing_items_edit($id)
    {
        $data = PricingItem::find($id);

              
        $pricing = Price::all();
        return view('admin.price_item.item_edit',compact('data','pricing'));
    }

    public function pricing_items_update(Request $request)
    {
        
        $data = PricingItem::find($request->id);
        $input['title'] = $request->title;
        $input['price_id'] = $request->price_id;
        $input['status'] = $request->status;
   
      
        PricingItem::where('id',$data->id)->update($input);
        return redirect('/admin/pricing_items')->with('success', "Pricing Items Updated successfully");
    }

    public function pricing_items_delete(Request $request)
    {
     
        $data =PricingItem::where('id', $request->id)->first();
        PricingItem::where('id', $request->id)->delete();
        return response()->json(['status'=>true,'message'=>'"Pricing Items deleted successfully"']); 
    }
}
