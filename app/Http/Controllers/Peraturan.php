<?php

namespace App\Http\Controllers;

use App\ModelPeraturan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use File;

class Peraturan extends Controller
{
    public function index(Request $request)
    {
        if (!Session::get('login')) {
            return redirect('login')->with('alert', 'Please create your session!');
        } else {
            $datas = ModelPeraturan::orderBy('updated_at', 'DESC')->get();

            return view('peraturan.view_data', compact('datas'))->with('i', ($request->input('page', 1) - 1) * 10);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'deskripsi' => 'required',
            'peraturan' => 'required',
            'status' => 'required'
        ]);

        try {
            $post = new ModelPeraturan;
            $post->user_id = Session::get('id');
            $post->deskripsi = $request->input('deskripsi');
            $post->peraturan = $request->input('peraturan');
            $post->status = $request->input('status');
            $post->save();

            return redirect('peraturan')->with('success', 'You have successfully save your data');
        } catch (\Exception $e) {
            return redirect('peraturan')->with('alert', 'Failed!');
        }
    }

    public function edit($id)
    {   
        $peraturan = ModelPeraturan::find($id);

        return response()->json([
            'data' => $peraturan
        ]);
    }

    public function update(Request $request)
    {   
        $this->validate($request, [
            'deskripsi_edit' => 'required',
            'peraturan_edit' => 'required',
            'status_edit' => 'required'
        ]);

        $param = $request->all();
        $data = [
            'user_id' => Session::get('id'),
            'deskripsi' => $param['deskripsi_edit'],
            'peraturan' => $param['peraturan_edit'],
            'status' => $param['status_edit']
        ];
        
        try {
            ModelPeraturan::where('id', '=', $request->input('id'))->update($data);
            return redirect('peraturan')->with('success', 'You have successfully update your files');
        } catch (\Exception $e) { 
            return redirect('peraturan')->with('alert', 'Failed!');
        }
    }

    public function delete($id)
    {
        ModelPeraturan::find($id)->delete($id);

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
