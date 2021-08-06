<?php

namespace App\Http\Controllers;

use App\ModelBasisData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use File;

class BasisData extends Controller
{
    public function index(Request $request)
    {
        if (!Session::get('login')) {
            return redirect('login')->with('alert', 'Please create your session!');
        } else {
            $datas = ModelBasisData::orderBy('updated_at', 'DESC')->get();

            return view('basis_data.view_data', compact('datas'))->with('i', ($request->input('page', 1) - 1) * 10);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_penulis' => 'required',
            'tahun' => 'required',
            'jenis_hiu' => 'required',
            'deskripsi' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg',
            'document' => 'required|mimes:doc,docx,pdf',
            'status' => 'required'
        ]);

        if ($request->hasFile('file') && $request->hasFile('document')) {
            $nama_penulis = $request->input('nama_penulis');
            $tahun = $request->input('tahun');
            $jenis_hiu = $request->input('jenis_hiu');
            $deskripsi = $request->input('deskripsi');
            $fileName = $request->file('file')->getClientOriginalName();
            $docName = $request->file('document')->getClientOriginalName();
            $status = $request->input('status');

            $request->file('file')->move(public_path('basis_data/image'), $fileName);
            $request->file('document')->move(public_path('basis_data/document'), $docName);

            $post = new ModelBasisData;
            $post->user_id = Session::get('id');
            $post->nama_penulis = $nama_penulis;
            $post->tahun = $tahun;
            $post->jenis_hiu = $jenis_hiu;
            $post->deskripsi = $deskripsi;
            $post->image = $fileName;
            $post->document = $docName;
            $post->status = $status;
            $post->save();

            return redirect('basisData')->with('success', 'You have successfully uploaded your files');
        } else {
            return redirect('basisData')->with('alert', 'Failed!');
        }
    }

    public function edit($id)
    {   
        $basisData = ModelBasisData::find($id);

        return response()->json([
            'data' => $basisData
        ]);
    }

    public function update(Request $request)
    {   
        $this->validate($request, [
            'nama_penulis_edit' => 'required',
            'tahun_edit' => 'required',
            'jenis_hiu_edit' => 'required',
            'deskripsi_edit' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg',
            'document_edit' => 'mimes:doc,docx,pdf',
            'status_edit' => 'required'
        ]);

        $param = $request->all();
        $data = [
            'user_id' => Session::get('id'),
            'nama_penulis' => $param['nama_penulis_edit'],
            'tahun' => $param['tahun_edit'],
            'jenis_hiu' => $param['jenis_hiu_edit'],
            'deskripsi' => $param['deskripsi_edit'],
            'status' => $param['status_edit']
        ];

        $imageFile = $request->hasFile('image');
        $docFile = $request->hasFile('document_edit');

        if ($imageFile && $docFile) {
            $imageDoc = ModelBasisData::where('id', '=', $request->input('id'))->first();
            File::delete('basis_data/image/'.$imageDoc->image);
            File::delete('basis_data/document/'.$imageDoc->document);

            $filename = $request->file('image')->getClientOriginalName();
            $docname = $request->file('document_edit')->getClientOriginalName();
            $data = ['image' => $filename, 'document' => $docname];
            $proses1 = $request->file('image')->move(public_path('basis_data/image'), $filename);
            $proses2 = $request->file('document_edit')->move(public_path('basis_data/document'), $docname);
        }
        
        try {
            ModelBasisData::where('id', '=', $request->input('id'))->update($data);
            return redirect('basisData')->with('success', 'You have successfully update your files');
        } catch (\Exception $e) { 
            return redirect('basisData')->with('alert', 'Failed!');
        }
    }

    public function delete($id)
    {
        $image = ModelBasisData::where('id', $id)->first();
        File::delete('basis_data/image/'.$image->image);

        $document = ModelBasisData::where('id', $id)->first();
        File::delete('basis_data/document/'.$document->document);

        ModelBasisData::find($id)->delete($id);

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
