<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $title = 'Category Lists';
        $user = Auth::user();
        $username = $user->name;

        if (!$user->can('view', new Category)) {
            abort(403, 'Unauthorized');
        }

        $categories = Category::all();

        return view('dashboard.category.index', compact('title', 'username', 'categories'));
    }

    public function create()
    {
        $title = 'Create new category';
        $user = Auth::user();
        $username = $user->name;

        if (!$user->can('create', new Category)) {
            abort(403, 'Unauthorized');
        }

        return view('dashboard.category.create', compact('title', 'username'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'unique:categories', 'max:255'],
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        Category::create([
            'name' => $request->name,
        ]);

        session()->flash('category_create_success', 'New category successfully added!');

        return redirect()->route('category.index');
    }
}
