@extends('layouts.master')

@section('content')
@include('dashboard.layouts.sidebar')

<div class="sm:ml-64 min-h-screen">
    @include('dashboard.layouts.navbar')
    <div class="p-4">
        <div class="text-white p-6 bg-gray-800 h-full w-1/3 rounded-lg">
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="category-name" class="block mb-3 text-sm font-medium text-white">Category name</label>
                    <input type="text" id="category-name" name="name" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Insert name...">
                </div>
                <div class="mb-2">
                    <button type="submit" class="font-medium rounded-lg text-sm px-5 py-2.5 mb-2 bg-purple-600 hover:bg-purple-700 focus:ring-purple-900">Create Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection