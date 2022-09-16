@extends('layout.master')

@section('content')

    <h1 class="text-center mt-4">Welcome to our blog post</h1>

    <div class="text-center">
        <a href="{{ route('login') }}" class="btn btn-outline-success">Login</a>
        <a href="" class="btn btn-outline-primary">Register</a>
        <a href="" class="btn btn-outline-success">Post List</a>
    </div>
@stop
