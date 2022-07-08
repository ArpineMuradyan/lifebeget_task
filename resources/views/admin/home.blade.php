@extends('layouts.app')
@include('layouts.auth_layout')

@section('content')
    <div class="container mt-10">
        <h1 class="text-6xl dark:text-white text-center">Welcome to admin page</h1>
        <h1 class="text-5xl dark:text-white text-center">Dear {{Auth::user()->name}}</h1>
    </div>
@endsection
