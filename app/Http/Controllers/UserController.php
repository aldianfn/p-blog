<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    public function profile()
    {
        $title = "Profile";

        if (Auth::check()) {
            $user = Auth::user();
        }

        return view('dashboard.profile.index', compact('title', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $title = "User List";

        if (Auth::check()) {
            $user = Auth::user();
            $username = $user->name;
        }

        $roles = Role::all();
        $users = User::with('role')->get();

        // if (Gate::authorize('viewUserMenu', $user)) {
        //     return view('dashboard.user.index', compact('title', 'username', 'users'));
        // }
        
        // return abort(403);
        return view('dashboard.user.index', compact('title', 'username', 'users', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $title = "Edit User";

        $roles = Role::all();
        $user = User::with('role')->find($user->id);

        return view('dashboard.user.edit', compact('title', 'roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // $validator = Validator::make($request->all(), [
        //     'role_id' => ['required', 'exists:roles,id'],
        // ]);

        // if($validator->fails()) {
        //     return back()->withErrors($validator);
        // }


        // $user->role_id = $request->role_id;
        // $user->save();

        // return back()->with('success', 'User role updated successfully!');

        $validator = Validator::make($request->all(), [
            'role_id.' . $user->id => ['required', 'exists:roles,id'],
        ]);
        
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $roleId = $request->input('role_id.' . $user->id);
        $user->role_id = $roleId;
        $user->save();

        return back()->with('succes', 'User role updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
