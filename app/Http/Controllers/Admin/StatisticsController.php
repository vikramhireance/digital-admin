<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Statistics;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\description;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;


class StatisticsController extends Controller
{
    public function statistics(Request $request)
    {
        if ($request->ajax()) {
            $data = Statistics::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    // ->editColumn('image', function($slider){
                    //     return '<img src="'.description::to('Services').'/'.$slider->image.'" width="60px">';
                    // })
                    ->addColumn('action', function($data){
                        return view('admin.statistics.statistics_action',compact('data'))->render();
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.statistics.statistics_index');
    }

    public function add(Request $request)
    {
        return view('admin.statistics.statistics_add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required',
            'title' => 'required',
            'description' => 'required',
            
        ]);

        $statistics = new Statistics;
        $statistics->number = $request->number;
        $statistics->title = $request->title;
        $statistics->description = $request->description;
        $statistics->save();
        return redirect('/admin/statistics')->with('success', "statistics Added successfully");
    }

    public function edit($id)
    {
        $data = Statistics::find($id);
        return view('admin.statistics.statistics_edit',compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'number' => 'required',
            'title' => 'required',
            'description' => 'required',
            
        ]);

        $input['number'] = $request->number;
        $input['title'] = $request->title;
        $input['description'] = $request->description;
        
        Statistics::where('id',$request->id)->update($input);
        return redirect('/admin/statistics')->with('success', "statistics Updated successfully");
    }

    public function delete(Request $request)
    {
        $data =Statistics::where('id', $request->id)->first();

        Statistics::where('id', $request->id)->delete();
        return response()->json(['status'=>true,'message'=>'"statistics deleted successfully"']); 
    }
}
