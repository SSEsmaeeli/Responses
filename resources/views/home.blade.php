@extends('layout.master')

@section('content')

    <h1 class="text-center mt-4">Welcome back to your profile page</h1>

    <ul>
        @if(auth()->user()->isAdmin())
            <div class="alert alert-primary">
                You are an admin and have full access.
            </div>
        @endif
        <li>Name: <label>{{ auth()->user()->name }}</label></li>
        <li>Email: <label>{{ auth()->user()->email }}</label></li>
        <li>Registered at: <label>{{ auth()->user()->created_at }}</label></li>
        <li>Latest Updated: <label>{{ auth()->user()->updated_at->ago() }}</label></li>
    </ul>

    <form method="post" action="{{ route('logout') }}">
        <a href="{{ route('posts.index') }}" class="btn btn-outline-primary">
            <span class="fa fa-newspaper"></span>
            Your Posts
        </a>

        <a href="{{ route('posts.create') }}" class="btn btn-outline-success">
            <span class="fa fa-plus"></span>
            Create New Post
        </a>


        @csrf
        <button type="submit" class="btn btn-outline-danger">Logout</button>
    </form>
@stop
