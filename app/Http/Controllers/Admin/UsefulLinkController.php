<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Links;
use App\Models\UsefulLinks;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\URL;
use PhpParser\Node\Stmt\Foreach_;

class UsefulLinkController extends Controller
{
    //
    public function useful_link(Request $request)
    {
        if ($request->ajax()) {
            $data = UsefulLinks::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                
                ->addColumn('action', function ($data) {
                    return view('admin.useful_link.action', compact('data'))->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.useful_link.useful_link_index');
    }
    public function add(Request $request)
    {
        $menu = UsefulLinks::get();
        $seo=[];
        foreach ($menu as $key => $value) {
            array_push($seo,$value->page_name);
        }
        $pages=Links::whereNotIn('page',$seo)->get();
        return view('admin.useful_link.useful_link_create',compact('pages'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'page_name'=>'required',
            'details'=>'required',
        ]);

        $useful_link = new UsefulLinks;
        $useful_link->page_name = $request->page_name;
        $useful_link->details = $request->details;

        
        $useful_link->save();
        return redirect('/admin/useful_link')->with('success', "UsefulLinks Added successfully");
    }

    public function edit($id)
    {
        $data = UsefulLinks::find($id);
        return view('admin.useful_link.useful_link_edit', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'details'=>'required',
        ]);

        $input['details'] = $request->details;

        UsefulLinks::where('id', $request->id)->update($input);
        return redirect('/admin/useful_link')->with('success', "Link Updated successfully");
    }

    public function delete(Request $request)
    {
        $data = UsefulLinks::where('id', $request->id)->first();

        UsefulLinks::where('id', $request->id)->delete();
        return response()->json(['status' => true, 'message' => '"Link deleted successfully"']);
    }
    public function mullti_delete(Request $request)
    {
        if(!$request->link_id){
            return json_encode(false);
        }
        $link_id = $request->link_id;
        UsefulLinks::whereIn('id', $link_id)->delete();
        return json_encode(true);
    }


}
