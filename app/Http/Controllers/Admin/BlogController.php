<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
        public function blog(Request $request)
        {
            if ($request->ajax()) {
                $data = Blog::select('*');
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->editColumn('image', function($slider){
                            return '<img src="'.URL::to('Blogs').'/'.$slider->image.'" width="60px">';
                        })
                        ->addColumn('action', function($data){
                            return view('admin.blog.action',compact('data'))->render();
                        })
                        ->rawColumns(['action','image'])
                        ->make(true);
            }
            return view('admin.blog.blog_index');
        }

        public function add(Request $request)
        {
            $categories = BlogCategory::get();
            return view('admin.blog.blog_create',compact('categories'));
        }
        public function store(Request $request)
        {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'category' => 'required',
                'image' => 'required',
                'meta_title' => 'required',
                'meta_description' => 'required',
                'meta_keyword' => 'required',
            ]);

            $blog = new Blog;
            $blog->title = $request->title;
            $blog->category = $request->category;
            $blog->description = $request->description;
            $blog->meta_title = $request->meta_title;
            $blog->image = $request->image;
            $blog->meta_description = $request->meta_description;
            $blog->meta_keyword = $request->meta_keyword;
            $blog->slug = Str::slug($request->title);

            if($request->category){
                $blog->category = json_encode($request->category);
            }

            if ($request->file('image')) {
            
                $file = $request->file('image');
                $filename =date('YmdHis') . "." . $file->getClientOriginalExtension();
                $file->move(public_path('Blogs'), $filename);
                $blog->image = $filename;
            }
            $blog->save();
            return redirect('/admin/blog')->with('success', "Blogs Added successfully");
        }

        public function edit($id)
        {
            $data = Blog::find($id);
            $categories = BlogCategory::get();
            return view('admin.blog.blog_edit',compact('data','categories'));
        }

        public function update(Request $request)
        {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'category' => 'required',
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
            $input['slug'] = Str::slug($request->title);

            if($request->category){
                $input['category'] = json_encode($request->category);
            }

            if ($request->file('image')) {
                $data = Blog::find($request->id);
                if($data->image){
                    $image_path = public_path('Blogs/').$data->image;
                    if(file_exists($image_path)){
                        File::delete($image_path);
                    }
                }
                $file = $request->file('image');
                $filename =date('YmdHis') . "." . $file->getClientOriginalExtension();
                $file->move(public_path('Blogs'), $filename);
                $input['image']  = $filename;
            }

            Blog::where('id',$request->id)->update($input);
            return redirect('/admin/blog')->with('success', "Serviice Updated successfully");
        }

        public function delete(Request $request)
        {
            $data =Blog::where('id', $request->id)->first();
            if($data->image){
                $image_path = public_path('Blogs/').$data->image;
                if(file_exists($image_path)){
                    File::delete($image_path);
                }
            }

            Blog::where('id', $request->id)->delete();
            return response()->json(['status'=>true,'message'=>'"Serviice deleted successfully"']); 
        }
}
