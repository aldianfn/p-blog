@extends('layouts.master')

@section('content')
    <div class="h-screen flex justify-center items-center">
        <form method="POST" action="{{ route('logout.logout_action') }}">
            @csrf
            <button type="submit" class="text-white w-full px-9 bg-yellow-200 dark:bg-yellow-700">Logout</button>
        </form>
    </div>
@endsection