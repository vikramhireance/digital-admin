<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonials;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;

class TestimonialsController extends Controller
{
        public function testimonial(Request $request)
        {
            if ($request->ajax()) {
                $data = Testimonials::select('*');
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->editColumn('person_image', function($slider){
                            return '<img src="'.URL::to('Testimonials').'/'.$slider->person_image.'" width="60px">';
                        })
                        ->addColumn('action', function($data){
                            return view('admin.testimonial.action',compact('data'))->render();
                        })
                        ->rawColumns(['action','person_image'])
                        ->make(true);
            }
            return view('admin.testimonial.testimonial_index');
        }

        public function add(Request $request)
        {
            return view('admin.testimonial.testimonial_create');
        }
        public function store(Request $request)
        {
            $request->validate([

                'name'=> 'required',
                'designation'=> 'required',
                'message'=> 'required',
                'person_image'=> 'required',
                'rating'=> 'required',
            ]);

            $testimonial = new Testimonials;
            $testimonial->name = $request->name;
            $testimonial->designation = $request->designation;
            $testimonial->message = $request->message;
            $testimonial->person_image = $request->person_image;
            $testimonial->rating = $request->rating;


            if ($request->file('person_image')) {
            
                $file = $request->file('person_image');
                $filename =date('YmdHis') . "." . $file->getClientOriginalExtension();
                $file->move(public_path('Testimonials'), $filename);
                $testimonial->person_image = $filename;
            }
            $testimonial->save();
            return redirect('/admin/testimonial')->with('success', "Testimonialss Added successfully");
        }

        public function edit($id)
        {
            $data = Testimonials::find($id);
            return view('admin.testimonial.testimonial_edit',compact('data'));
        }

        public function update(Request $request)
        {
            $request->validate([

                'name'=> 'required',
                'designation'=> 'required',
                'message'=> 'required',
                'rating'=> 'required',
            ]);

            $input['name'] = $request->name;
            $input['designation'] = $request->designation;
            $input['message'] = $request->message;
            $input['rating'] = $request->rating;
            if($request->person_image){
                if($request->file('person_image')) {
                    $data = Testimonials::find($request->id);
                    if($data->person_image){
                        $image_path = public_path('Testimonials/').$data->person_image;
                        if(file_exists($image_path)){
                            File::delete($image_path);
                        }
                    }
                    $file = $request->file('person_image');
                    $filename =date('YmdHis') . "." . $file->getClientOriginalExtension();
                    $file->move(public_path('Testimonials'), $filename);
                    $input['person_image']  = $filename;
                }
            }

            Testimonials::where('id',$request->id)->update($input);
            return redirect('/admin/testimonial')->with('success', "Serviice Updated successfully");
        }

        public function delete(Request $request)
        {
            $data =Testimonials::where('id', $request->id)->first();
            if($data->person_image){
                $image_path = public_path('Testimonials/').$data->person_image;
                if(file_exists($image_path)){
                    File::delete($image_path);
                }
            }

            Testimonials::where('id', $request->id)->delete();
            return response()->json(['status'=>true,'message'=>'"Serviice deleted successfully"']); 
        }
}
