<?php

namespace App\Http\Controllers;

use App\ModelTentang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use File;

class Tentang extends Controller
{
    public function index(Request $request)
    {
        if (!Session::get('login')) {
            return redirect('login')->with('alert', 'Please create your session!');
        } else {
            return view('tentang.input_page');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'sub_judul' => 'required',
            'konten' => 'required'
        ]);

        try {
            $post = new ModelTentang;
            $post->user_id = Session::get('id');
            $post->judul = $request->input('judul');
            $post->sub_judul = $request->input('sub_judul');
            $post->konten = $request->input('konten');
            $post->save();

            return redirect('tentang')->with('success', 'You have successfully save your data');
        } catch (\Exception $e) {
            return redirect('tentang')->with('alert', 'Failed!');
        }
    }
}
