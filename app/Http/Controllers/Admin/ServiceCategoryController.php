<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;

class ServiceCategoryController extends Controller
{
    public function service_category(Request $request)
    {
        if ($request->ajax()) {
            $data = ServiceCategory::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('image', function($slider){
                        return '<img src="'.URL::to('Services').'/'.$slider->image.'" width="60px">';
                    })
                    ->addColumn('action', function($data){
                        return view('admin.services_category.action',compact('data'))->render();
                    })
                    ->rawColumns(['action','image'])
                    ->make(true);
        }
        return view('admin.services_category.service_index');
    }

    public function service_category_add(Request $request)
    {
        return view('admin.services_category.service_create');
    }
    public function service_category_store(Request $request)
    {
        
        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
        ]);

        $service = new ServiceCategory;
        $service->title = $request->title;
        $service->meta_title = $request->meta_title;
        $service->image = $request->image;
        $service->meta_description = $request->meta_description;
        $service->meta_keywords = $request->meta_keywords;
        $service->slug = Str::slug($request->title);

        if ($request->file('image')) {
           
            $file = $request->file('image');
            $filename =date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move(public_path('Services'), $filename);
            $service->image = $filename;
        }
        $service->save();
        return redirect('/admin/service_category')->with('success', "Serviice CAtegory Added successfully");
    }

    public function service_category_edit($id)
    {
        $data = ServiceCategory::find($id);
        return view('admin.services_category.service_edit',compact('data'));
    }

    public function service_category_update(Request $request)
    {
        $data = ServiceCategory::find($request->id);

        $request->validate([
            'title' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
        ]);

        if ($request->file('image')) {
            if($data->image){
                $image_path = public_path('Services/').$data->image;
                if(file_exists($image_path)){
                    File::delete($image_path);
                }
            }
            $file = $request->file('image');
            $filename =date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move(public_path('Services'), $filename);
            $input['image']  = $filename;
        }

        $input['title'] = $request->title;
        $input['meta_title'] = $request->meta_title;
        $input['meta_description'] = $request->meta_description;
        $input['meta_keywords'] = $request->meta_keywords;
        $input['slug'] = Str::slug($request->title);

        ServiceCategory::find($request->id)->update($input);
        return redirect('/admin/service_category')->with('success', "Serviice Category Updated successfully");
    }

    public function service_category_delete(Request $request)
    {
        $data =ServiceCategory::where('id', $request->id)->first();
        if($data->image){
            $image_path = public_path('Services/').$data->image;
            if(file_exists($image_path)){
                File::delete($image_path);
            }
        }

        ServiceCategory::where('id', $request->id)->delete();
        return response()->json(['status'=>true,'message'=>'"Serviice Category deleted successfully"']); 
    }
}
