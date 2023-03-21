<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;

class ContactMessageController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ContactMessage::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return view('admin.messages.action', compact('data'))->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.messages.ContactMessage');
    }

    public function delete(Request $request)
    {
        ContactMessage::where('id', $request->id)->delete();
        return response()->json(['status' => true, 'message' => '"Contact Message deleted successfully"']);
    }
}
