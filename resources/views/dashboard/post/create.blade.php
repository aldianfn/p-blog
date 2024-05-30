@extends('layouts.master')

@section('content')
@include('dashboard.layouts.sidebar')

<div class="sm:ml-64 min-h-screen">
    @include('dashboard.layouts.navbar')
    <div class="p-4">
        <div class="text-white p-6 bg-gray-800 h-auto w-full">
            <form action="{{ route('post.store') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="post-title" class="block mb-2 text-sm font-medium text-white">Title</label>
                    <input type="text" id="post-title" name="title" class="border text-sm rounded-lg block w-1/3 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Post title">
                </div>
                <div class="mb-6">                
                    <label for="content" class="block mb-2 text-sm font-mediumtext-white">Content</label>
                    <textarea id="content" name="content" rows="4" class="block p-2.5 w-full text-sm rounded-lg border bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                </div>
                <div class="mb-6">
                    <button type="submit" class="font-medium rounded-lg text-sm px-5 py-2.5 mb-2 bg-purple-600 hover:bg-purple-700 focus:ring-purple-900">Create Post</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection