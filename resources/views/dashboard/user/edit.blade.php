@extends('layouts.master')

@section('content')
@include('dashboard.layouts.sidebar')

<div class="sm:ml-64 min-h-screen">
    @include('dashboard.layouts.navbar')
    <div class="p-4">
        <form class="max-w-md" action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            <h1 class="text-white text-2xl mb-4">{{ $user->name }}</h1>
            <div class="flex items-center mb-4">
                <label for="countries" class="block mb-2 mr-4 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                <select id="countries" name="role_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" @if ($user->role->role === $role->role) selected @endif>{{ $role->role }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex">
                <button type="submit" class="py-2 px-3 mr-4 text-white bg-blue-700 rounded-lg">Save</button>
                <a href="{{ route('user.show') }}" class="py-2 px-3 text-white bg-green-700 rounded-lg">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection