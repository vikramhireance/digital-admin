<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    public function service(Request $request)
    {
        if ($request->ajax()) {
            $data = Service::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                
                ->addColumn('action', function ($data) {
                    return view('admin.service.action', compact('data'))->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.service.service_index');
    }

    public function add(Request $request)
    {
        $categories = ServiceCategory::get();
        return view('admin.service.service_create', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
           
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keyword' => 'required',
        ]);

        $service = new Service;
        $service->title = $request->title;
        $service->category = $request->category;
        $service->description = $request->description;
        $service->meta_title = $request->meta_title;
        
        $service->meta_description = $request->meta_description;
        $service->meta_keyword = $request->meta_keyword;
        $service->slug = Str::slug($request->title);

        if ($request->category) {
            $service->category = json_encode($request->category);
        }

       
        $service->save();
        return redirect('/admin/service')->with('success', "Services Added successfully");
    }

    public function edit($id)
    {
        $data = Service::find($id);
        $categories = ServiceCategory::get();
        return view('admin.service.service_edit', compact('data', 'categories'));
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

        if ($request->category) {
            $input['category'] = json_encode($request->category);
        }


        Service::where('id', $request->id)->update($input);
        return redirect('/admin/service')->with('success', "Serviice Updated successfully");
    }

    public function delete(Request $request)
    {
        $data = Service::where('id', $request->id)->first();
        if ($data->image) {
            $image_path = public_path('Services/') . $data->image;
            if (file_exists($image_path)) {
                File::delete($image_path);
            }
        }

        Service::where('id', $request->id)->delete();
        return response()->json(['status' => true, 'message' => '"Serviice deleted successfully"']);
    }

    public function chatGptData(Request $request)
    {
        $dTemperature = 0.9;
        $iMaxTokens = 100;
        $top_p = 1;
        $frequency_penalty = 0.0;
        $presence_penalty = 0.0;
        $OPENAI_API_KEY = generalSettings()->chat_gpt_api_key;
        $sModel = "text-davinci-003";
        $prompt = $request->title;
        $ch = curl_init();
        $headers  = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Bearer ' . $OPENAI_API_KEY . ''
        ];

        $postData = [
            'model' => $sModel,
            'prompt' => str_replace('"', '', $prompt),
            'temperature' => $dTemperature,
            'max_tokens' => $iMaxTokens,
            'top_p' => $top_p,
            'frequency_penalty' => $frequency_penalty,
            'presence_penalty' => $presence_penalty,
            'stop' => '[" Human:", " AI:"]',
        ];

        curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/completions');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));

        $result = curl_exec($ch);
        $decoded_json = json_decode($result, true);

        return json_encode($decoded_json['choices'][0]['text']);
    }
}
