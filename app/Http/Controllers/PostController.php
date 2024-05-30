<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        $title = 'Post List';

        if(Auth::check()) {
            $user = Auth::user();
            $username = $user->name;

            $posts = $user->posts()->get();
        }

        return view('dashboard.post.index', compact('title', 'username', 'posts'));
    }

    public function create()
    {
        $title = 'Create new post';

        Gate::authorize('create', new Post);

        if(Auth::check()) {
            $user = Auth::user();
            $username = $user->name;
        }

        return view('dashboard.post.create', compact('title', 'username'));
    }

    public function store(Request $request)
    {
        if(Auth::check()) {
            $user = Auth::user();
            $user_id = $user->id;
        }

        $validator = Validator::make($request->all(), [
            'title' => ['required', 'max:255'],
            'content' => ['required'],
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $user_id,
        ]);
    }
}
