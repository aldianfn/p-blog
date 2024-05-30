@extends('layouts.master')

@section('content')
@include('dashboard.layouts.sidebar')

<div class="sm:ml-64 min-h-screen">
    @include('dashboard.layouts.navbar')
    <div class="p-4">
        <div class="text-right mt-3">
            <a href="{{ route('tag.create') }}" class="bg-green-600 text-white rounded-lg px-3 py-2">
                Create new Tag
            </a>
        </div>
        <div class="relative overflow-x-auto shadow-md rounded-lg mt-6">
            @if($tags->isEmpty())
                <div class="p-4 text-sm text-blue-800 bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                    <span class="font-medium">No tag available!</span> Create new tag.
                </div>
            @else
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-white">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3 text-white">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3 lg:w-72 text-white text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 text-white">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 text-white">
                                {{ $tag->name }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col justify-center md:flex-row">
                                    <a href="#" class="bg-blue-700 mr-2 px-3 py-2 rounded-lg text-white">View</a>
                                    {{-- <button id="user_edit_{{ $user->id }}" type="button" class="user-edit mr-3 my-3 md:my-0 bg-green-700 px-3 py-2 rounded-lg text-white">Edit</button>
                                    <button id="user_edit_confirmation_{{ $user->id }}" type="submit" class="hidden mr-2 my-3 md:my-0 bg-green-700 px-3 py-2 rounded-lg text-white">Confirm</button> --}}
                                    <a href="#" class="bg-red-600 px-3 py-2 rounded-lg text-white">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endforelse
        </div>
    </div>
</div>
@endsection