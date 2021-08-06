<?php

namespace App\Http\Controllers;

use App\ModelPublikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use File;

class Publikasi extends Controller
{
    public function index(Request $request)
    {
        if (!Session::get('login')) {
            return redirect('login')->with('alert', 'Please create your session!');
        } else {
            $datas = ModelPublikasi::orderBy('updated_at', 'DESC')->get();

            return view('publikasi.view_data', compact('datas'))->with('i', ($request->input('page', 1) - 1) * 10);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'des_singkat' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg',
            'status' => 'required'
        ]);

        if ($request->hasFile('file')) {
            $judul = $request->input('judul');
            $des_singkat = $request->input('des_singkat');
            $fileName = $request->file('file')->getClientOriginalName();
            $status = $request->input('status');

            $request->file('file')->move(public_path('publikasi'), $fileName);

            $post = new ModelPublikasi;
            $post->user_id = Session::get('id');
            $post->judul = $judul;
            $post->des_singkat = $des_singkat;
            $post->image = $fileName;
            $post->status = $status;
            $post->save();

            return redirect('publikasiCms')->with('success', 'You have successfully uploaded your files');
        } else {
            return redirect('publikasiCms')->with('alert', 'Failed!');
        }
    }

    public function edit($id)
    {   
        $publikasi = ModelPublikasi::find($id);

        return response()->json([
            'data' => $publikasi
        ]);
    }

    public function update(Request $request)
    {   
        $this->validate($request, [
            'judul_edit' => 'required',
            'des_singkat_edit' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg',
            'status_edit' => 'required'
        ]);

        $param = $request->all();
        $data = [
            'user_id' => Session::get('id'),
            'judul' => $param['judul_edit'],
            'des_singkat' => $param['des_singkat_edit'],
            'status' => $param['status_edit']
        ];

        $imageFile = $request->hasFile('image');

        if ($imageFile) {
            $image = ModelPublikasi::where('id', '=', $request->input('id'))->first();
            File::delete('publikasi/'.$image->image);

            $filename = $request->file('image')->getClientOriginalName();
            $data['image'] = $filename;
            $proses = $request->file('image')->move(public_path('publikasi'), $filename);
        }
        
        try {
            ModelPublikasi::where('id', '=', $request->input('id'))->update($data);
            return redirect('publikasiCms')->with('success', 'You have successfully update your files');
        } catch (\Exception $e) { 
            return redirect('publikasiCms')->with('alert', 'Failed!');
        }
    }

    public function delete($id)
    {
        $image = ModelPublikasi::where('id', $id)->first();
        File::delete('publikasi/'.$image->image);
        ModelPublikasi::find($id)->delete($id);

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
