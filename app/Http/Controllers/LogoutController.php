<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function index()
    {
        $title = "Logout test";

        return view('logout', compact('title'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerate();

        return redirect()->intended('/login');
    }
}
