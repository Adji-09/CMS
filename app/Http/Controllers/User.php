<?php

namespace App\Http\Controllers;

use App\ModelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class User extends Controller
{
    public function index()
    {
        if (!Session::get('login')) {
            return redirect('login')->with('alert', 'Incorrect Username or not registered!');
        } else {
            return view('layouts.dashboard');
        }
    }

    public function login()
    {
        return view('login.login');
    }

    public function loginPost(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $data = ModelUser::where('username', $username)->first();

        if ($data) {
            if (Hash::check($password, $data->password)) {
                Session::put('id', $data->id);
                Session::put('name', $data->name);
                Session::put('login', TRUE);
                return redirect('/');
            } else {
                return redirect('login')->with('alert', 'Incorrect Password!');
            }
        } else {
            return redirect('login')->with('alert', 'Incorrect Password!');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('login')->with('success', 'Thank you, see you soon');
    }
}
