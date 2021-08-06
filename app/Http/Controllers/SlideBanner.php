<?php

namespace App\Http\Controllers;

use App\ModelSlideBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use File;

class SlideBanner extends Controller
{
    public function index(Request $request)
    {
        if (!Session::get('login')) {
            return redirect('login')->with('alert', 'Please create your session!');
        } else {
            $datas = ModelSlideBanner::orderBy('updated_at', 'DESC')->get();

            return view('slide_banner.view_data', compact('datas'))->with('i', ($request->input('page', 1) - 1) * 10);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg',
            'status' => 'required'
        ]);

        if ($request->hasFile('file')) {
            $fileName = $request->file('file')->getClientOriginalName();
            $status = $request->input('status');

            $request->file('file')->move(public_path('slide_banner'), $fileName);

            $post = new ModelSlideBanner;
            $post->user_id = Session::get('id');
            $post->image = $fileName;
            $post->status = $status;
            $post->save();

            return redirect('slideBanner')->with('success', 'You have successfully uploaded your files');
        } else {
            return redirect('slideBanner')->with('alert', 'Failed!');
        }
    }

    public function edit($id)
    {   
        $slideBanner = ModelSlideBanner::find($id);

        return response()->json([
            'data' => $slideBanner
        ]);
    }

    public function update(Request $request)
    {   
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg',
            'status_edit' => 'required'
        ]);

        $param = $request->all();
        $data = [
            'user_id' => Session::get('id'),
            'status' => $param['status_edit']
        ];

        $imageFile = $request->hasFile('image');

        if ($imageFile) {
            $image = ModelSlideBanner::where('id', '=', $request->input('id'))->first();
            File::delete('slide_banner/'.$image->image);

            $filename = $request->file('image')->getClientOriginalName();
            $data['image'] = $filename;
            $proses = $request->file('image')->move(public_path('slide_banner'), $filename);
        }
        
        try {
            ModelSlideBanner::where('id', '=', $request->input('id'))->update($data);
            return redirect('slideBanner')->with('success', 'You have successfully update your files');
        } catch (\Exception $e) { 
            return redirect('slideBanner')->with('alert', 'Failed!');
        }
    }

    public function delete($id)
    {
        $image = ModelSlideBanner::where('id', $id)->first();
        File::delete('slide_banner/'.$image->image);
        ModelSlideBanner::find($id)->delete($id);

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
