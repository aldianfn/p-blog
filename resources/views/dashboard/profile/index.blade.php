@extends('layouts.master')

@section('content')
@include('dashboard.layouts.sidebar')

<div class="sm:ml-64 min-h-screen">
    @include('dashboard.layouts.navbar')
    <div class="p-4">
        <h1 class="text-white"">
            Hello, {{ $user->name }}!
        </h1>
    </div>
</div>
@endsection