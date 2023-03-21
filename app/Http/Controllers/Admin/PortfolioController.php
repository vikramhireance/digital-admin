<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PortfolioCatrgory;
use App\Models\Portfolio;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;

class PortfolioController extends Controller
{
        public function portfolio(Request $request)
        {
            if ($request->ajax()) {
                $data = Portfolio::join('portfolio_catrgories','portfolio_catrgories.id','portfolios.category')->select('portfolios.*','portfolio_catrgories.title as category_title');
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->editColumn('image', function($slider){
                            return '<img src="'.URL::to('Portfolios').'/'.$slider->image.'" width="60px">';
                        })
                        ->editColumn('gallery_image', function($slider){
                            return '<img src="'.URL::to('Portfolios').'/'.$slider->gallery_image.'" width="60px">';
                        })
                        ->addColumn('action', function($data){
                            return view('admin.portfolio.action',compact('data'))->render();
                        })
                        ->rawColumns(['action','image','gallery_image'])
                        ->make(true);
            }
            return view('admin.portfolio.portfolio_index');
        }

        public function add(Request $request)
        {
            $categories = PortfolioCatrgory::get();
            return view('admin.portfolio.portfolio_create',compact('categories'));
        }
        public function store(Request $request)
        {
            $request->validate([
                'title' => 'required',
                'category' => 'required',
                'description' => 'required',
                'image' => 'required',
                'gallery_image' => 'required',
                'meta_title' => 'required',
                'meta_description' => 'required',
                'meta_keyword' => 'required',
            ]);

            $portfolio = new Portfolio;
            $portfolio->title = $request->title;
            $portfolio->category = $request->category;
            $portfolio->description = $request->description;
            $portfolio->image = $request->image;
            $portfolio->gallery_image = $request->gallery_image;
            $portfolio->meta_title = $request->meta_title;
            $portfolio->meta_description = $request->meta_description;
            $portfolio->meta_keyword = $request->meta_keyword;
            $portfolio->category = $request->category;
            $portfolio->slug = Str::slug($request->title);


            if ($request->file('image')) {
            
                $file = $request->file('image');
                $filename =date('YmdHis') . "." . $file->getClientOriginalExtension();
                $file->move(public_path('Portfolios'), $filename);
                $portfolio->image = $filename;
            }
            if ($request->file('gallery_image')) {
            
                $file = $request->file('gallery_image');
                $filename =date('YmdHis') . "." . $file->getClientOriginalExtension();
                $file->move(public_path('Portfolios/gallery'), $filename);
                $portfolio->gallery_image = $filename;
            }
            $portfolio->save();
            return redirect('/admin/portfolio')->with('success', "Portfolios Added successfully");
        }

        public function edit($id)
        {
            $data = Portfolio::find($id);
            $categories = PortfolioCatrgory::get();
            return view('admin.portfolio.portfolio_edit',compact('data','categories'));
        }

        public function update(Request $request)
        {
            $request->validate([
                'title' => 'required',
                'category' => 'required',
                'description' => 'required',
                'meta_title' => 'required',
                'meta_description' => 'required',
                'meta_keyword' => 'required',
            ]);

            $input['title'] = $request->title;
            $input['description'] = $request->description;
            $input['category'] = $request->category;
            $input['meta_title'] = $request->meta_title;
            $input['meta_description'] = $request->meta_description;
            $input['meta_keyword'] = $request->meta_keyword;
            $input['category'] = $request->category;
            $input['slug'] = Str::slug($request->title);


            if ($request->file('image')) {
                $data = Portfolio::find($request->id);
                if($data->image){
                    $image_path = public_path('Portfolios/').$data->image;
                    if(file_exists($image_path)){
                        File::delete($image_path);
                    }
                }
                $file = $request->file('image');
                $filename =date('YmdHis') . "." . $file->getClientOriginalExtension();
                $file->move(public_path('Portfolios'), $filename);
                $input['image']  = $filename;
            }
            if ($request->file('gallery_image')) {
                $data = Portfolio::find($request->id);
                if($data->gallery_image){
                    $image_path = public_path('Portfolios/gallery/').$data->gallery_image;
                    if(file_exists($image_path)){
                        File::delete($image_path);
                    }
                }
                $file = $request->file('gallery_image');
                $filename =date('YmdHis') . "." . $file->getClientOriginalExtension();
                $file->move(public_path('Portfolios/gallery'), $filename);
                $input['gallery_image']  = $filename;
            }

            Portfolio::where('id',$request->id)->update($input);
            return redirect('/admin/portfolio')->with('success', "portfolio Updated successfully");
        }

        public function delete(Request $request)
        {
            $data =Portfolio::where('id', $request->id)->first();
            if($data->image){
                $image_path = public_path('Portfolios/').$data->image;
                if(file_exists($image_path)){
                    File::delete($image_path);
                }
            }
            if($data->gallery_image){
                $image_path = public_path('Portfolios/gallery/').$data->gallery_image;
                if(file_exists($image_path)){
                    File::delete($image_path);
                }
            }

            Portfolio::where('id', $request->id)->delete();
            return response()->json(['status'=>true,'message'=>'"Serviice deleted successfully"']); 
        }
}
