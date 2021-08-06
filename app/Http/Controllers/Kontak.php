<?php

namespace App\Http\Controllers;

use App\ModelKontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use File;

class Kontak extends Controller
{
    public function index(Request $request)
    {
        if (!Session::get('login')) {
            return redirect('login')->with('alert', 'Please create your session!');
        } else {
            return view('kontak.input_page');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'no_telpon' => 'required',
            'pesan' => 'required'
        ]);

        try {
            $post = new ModelKontak;
            $post->user_id = Session::get('id');
            $post->nama = $request->input('nama');
            $post->email = $request->input('email');
            $post->no_telpon = $request->input('no_telpon');
            $post->pesan = $request->input('pesan');
            $post->save();

            return redirect('kontak')->with('success', 'You have successfully save your data');
        } catch (\Exception $e) {
            return redirect('kontak')->with('alert', 'Failed!');
        }
    }
}
