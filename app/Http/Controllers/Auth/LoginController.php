<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function setSession(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'user_name' => 'required',
        ]);

        session()->put([
            'isLoggedIn' => true,
            'user_id' => $request->user_id,
            'user_name' => $request->user_name,
        ]);

        return response()->json(['status' => true]);
    }

    public function logout()
    {
        session()->flush();

        return redirect('/login');
    }
}
