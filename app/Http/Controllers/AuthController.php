<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function auth(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->login)) {
            return redirect()->route('dashboard');
        }


        return back()->with('error', 'Login info not matched!');
    }
}
