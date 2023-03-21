<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PortfolioCatrgory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;

class PortfolioCategoryController extends Controller
{
    public function portfolio_category(Request $request)
    {
        if ($request->ajax()) {
            $data = PortfolioCatrgory::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('image', function($slider){
                        return '<img src="'.URL::to('Upload/Portfolios').'/'.$slider->image.'" width="60px">';
                    })
                    ->addColumn('action', function($data){
                        return view('admin.portfolio_category.action',compact('data'))->render();
                    })
                    ->rawColumns(['action','image'])
                    ->make(true);
        }
        return view('admin.portfolio_category.portfolio_index');
    }

    public function add(Request $request)
    {
        return view('admin.portfolio_category.portfolio_create');
    }
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
        ]);

        $service = new PortfolioCatrgory;
        $service->title = $request->title;
        $service->meta_title = $request->meta_title;
        $service->image = $request->image;
        $service->meta_description = $request->meta_description;
        $service->meta_keywords = $request->meta_keywords;
        $service->slug = Str::slug($request->title);

        if ($request->file('image')) {
           
            $file = $request->file('image');
            $filename =date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move(public_path('Upload/Portfolios'), $filename);
            $service->image = $filename;
        }
        $service->save();
        return redirect('/admin/portfolio-category')->with('success', "Serviice CAtegory Added successfully");
    }

    public function edit($id)
    {
        $data = PortfolioCatrgory::find($id);
        return view('admin.portfolio_category.portfolio_edit',compact('data'));
    }

    public function update(Request $request)
    {
        $data = PortfolioCatrgory::find($request->id);

        $request->validate([
            'title' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
        ]);

        if ($request->file('image')) {
            if($data->image){
                $image_path = public_path('Upload/Portfolios/').$data->image;
                if(file_exists($image_path)){
                    File::delete($image_path);
                }
            }
            $file = $request->file('image');
            $filename =date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move(public_path('Upload/Portfolios'), $filename);
            $input['image']  = $filename;
        }

        $input['title'] = $request->title;
        $input['meta_title'] = $request->meta_title;
        $input['meta_description'] = $request->meta_description;
        $input['meta_keywords'] = $request->meta_keywords;
        $input['slug'] = Str::slug($request->title);

        PortfolioCatrgory::find($request->id)->update($input);
        return redirect('/admin/portfolio-category')->with('success', "Serviice Category Updated successfully");
    }

    public function delete(Request $request)
    {
        $data =PortfolioCatrgory::where('id', $request->id)->first();
        if($data->image){
            $image_path = public_path('Upload/Portfolios/').$data->image;
            if(file_exists($image_path)){
                File::delete($image_path);
            }
        }

        PortfolioCatrgory::where('id', $request->id)->delete();
        return response()->json(['status'=>true,'message'=>'"Serviice Category deleted successfully"']); 
    }
}
