<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManageSeo;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\URL;
use PhpParser\Node\Stmt\Foreach_;

class ManageSeoController extends Controller
{
    //
    public function manage_seo(Request $request)
    {
        if ($request->ajax()) {
            $data = ManageSeo::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                
                ->addColumn('action', function ($data) {
                    return view('admin.manage_seo.action', compact('data'))->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.manage_seo.manage_seo_index');
    }
    public function add(Request $request)
    {
        $menu = ManageSeo::get();
        $seo=[];
        foreach ($menu as $key => $value) {
            array_push($seo,$value->page_name);
        }
        $pages=Menu::whereNotIn('slug',$seo)->get();
        return view('admin.manage_seo.manage_seo_create',compact('pages'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'page_name'=>'required',
            'title' => 'required',
            'meta_description' => 'required',
            'meta_keyword' => 'required',
        ]);

        $manage_seo = new ManageSeo;
        $manage_seo->title = $request->title;
        $manage_seo->page_name = $request->page_name;
        $manage_seo->meta_description = $request->meta_description;
        $manage_seo->meta_keyword = $request->meta_keyword;

        
        $manage_seo->save();
        return redirect('/admin/manage_seo')->with('success', "ManageSeos Added successfully");
    }

    public function edit($id)
    {
        $data = ManageSeo::find($id);
        return view('admin.manage_seo.manage_seo_edit', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'meta_description' => 'required',
            'meta_keyword' => 'required',
        ]);

        $input['title'] = $request->title;
        $input['meta_description'] = $request->meta_description;
        $input['meta_keyword'] = $request->meta_keyword;

        ManageSeo::where('id', $request->id)->update($input);
        return redirect('/admin/manage_seo')->with('success', "SEO Updated successfully");
    }

    public function delete(Request $request)
    {
        $data = ManageSeo::where('id', $request->id)->first();

        ManageSeo::where('id', $request->id)->delete();
        return response()->json(['status' => true, 'message' => '"Seo deleted successfully"']);
    }

}
