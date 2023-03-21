<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;

class EmailSubscriberController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = EmailSubscriber::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return view('admin.messages.action2', compact('data'))->render();
                })
                ->rawColumns(['action', 'file'])
                ->make(true);
        }
        return view('admin.messages.EmailSubscriber');
    }

    public function delete(Request $request)
    {
        EmailSubscriber::where('id', $request->id)->delete();
        return response()->json(['status' => true, 'message' => '"Contact Message deleted successfully"']);
    }
}
