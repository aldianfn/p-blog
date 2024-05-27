<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $title = "Dashboard";

        if (Auth::check()) {
            $user = Auth::user();
            $username = $user->name;
        }

        return view('dashboard.index', compact('title', 'username'));
    }
}
