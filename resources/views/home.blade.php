@extends('layout.master')

@section('content')

    <h1 class="text-center mt-4">Welcome back to your profile page</h1>

    <ul>
        <li>Name: <label>{{ auth()->user()->name }}</label></li>
        <li>Email: <label>{{ auth()->user()->email }}</label></li>
        <li>Registered at: <label>{{ auth()->user()->created_at }}</label></li>
        <li>Latest Updated: <label>{{ auth()->user()->updated_at->ago() }}</label></li>
    </ul>

    <form method="post" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-outline-danger">Logout</button>
    </form>
@stop
