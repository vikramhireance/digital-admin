<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
        public function team(Request $request)
        {
            if ($request->ajax()) {
                $data = Team::select('*');
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->editColumn('person_image', function($slider){
                            return '<img src="'.URL::to('Upload/Teams').'/'.$slider->person_image.'" width="60px">';
                        })
                        ->editColumn('description', function($data){
                            return $data->description;
                        })
                        ->addColumn('action', function($data){
                            return view('admin.team.action',compact('data'))->render();
                        })
                        ->rawColumns(['action','person_image','description'])
                        ->make(true);
            }
            return view('admin.team.team_index');
        }

        public function add(Request $request)
        {
            return view('admin.team.team_create');
        }
        public function store(Request $request)
        {
            $request->validate([

                'name'=> 'required',
                'designation'=> 'required',
                'person_image'=> 'required',
                'description'=> 'required',
                'facebook_URL'=> 'required',
                'instagram_URL'=> 'required',
                'linkedin_URL'=> 'required',
            ]);

            $team = new Team;
            $team->name = $request->name;
            $team->designation = $request->designation;
            $team->person_image = $request->person_image;
            $team->description = $request->description;
            $team->facebook_URL = $request->facebook_URL;
            $team->instagram_URL = $request->instagram_URL;
            $team->linkedin_URL = $request->linkedin_URL;


            if ($request->file('person_image')) {
            
                $file = $request->file('person_image');
                $filename =date('YmdHis') . "." . $file->getClientOriginalExtension();
                $file->move(public_path('Upload/Teams'), $filename);
                $team->person_image = $filename;
            }
            $team->save();
            return redirect('/admin/team')->with('success', "Teams Added successfully");
        }

        public function edit($id)
        {
            $data = Team::find($id);
            return view('admin.team.team_edit',compact('data'));
        }

        public function update(Request $request)
        {
            $request->validate([

                'name'=> 'required',
                'designation'=> 'required',
                'description'=> 'required',
                'facebook_URL'=> 'required',
                'instagram_URL'=> 'required',
                'linkedin_URL'=> 'required',
            ]);

            $input['name'] = $request->name;
            $input['designation'] = $request->designation;
            $input['description'] = $request->description;
            $input['facebook_URL'] = $request->facebook_URL;
            $input['instagram_URL'] = $request->instagram_URL;
            $input['linkedin_URL'] = $request->linkedin_URL;
            if($request->person_image){
                if($request->file('person_image')) {
                    $data = Team::find($request->id);
                    if($data->person_image){
                        $image_path = public_path('Upload/Teams/').$data->person_image;
                        if(file_exists($image_path)){
                            File::delete($image_path);
                        }
                    }
                    $file = $request->file('person_image');
                    $filename =date('YmdHis') . "." . $file->getClientOriginalExtension();
                    $file->move(public_path('Upload/Teams'), $filename);
                    $input['person_image']  = $filename;
                }
            }

            Team::where('id',$request->id)->update($input);
            return redirect('/admin/team')->with('success', "Team Updated successfully");
        }

        public function delete(Request $request)
        {
            $data =Team::where('id', $request->id)->first();
            if($data->person_image){
                $image_path = public_path('Team/').$data->person_image;
                if(file_exists($image_path)){
                    File::delete($image_path);
                }
            }

            Team::where('id', $request->id)->delete();
            return response()->json(['status'=>true,'description'=>'"team deleted successfully"']); 
        }
}

