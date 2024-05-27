<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $title = 'Post List';

        if(Auth::check()) {
            $user = Auth::user();
            $username = $user->name;

            $posts = $user->posts()->get();
            // dd($posts);
        }

        return view('dashboard.post.index', compact('title', 'username', 'posts'));
    }
}
