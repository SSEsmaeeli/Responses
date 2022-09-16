@extends('layout.master')

@section('content')

    <h1 class="text-center my-4">Login Page</h1>

    <div class="d-flex justify-content-center">
        <form action="{{ route('login.submit') }}" method="post">
            @csrf
            <div class="form-group">
                <label>Email:</label>
                <input type="text" name="email" class="form-control">
            </div>

            <div class="form-group">
                <label>Passowrd:</label>
                <input type="text" name="email" class="form-control">
            </div>

            <div class="form-group mt-2">
                <button class="btn btn-outline-primary">Login</button>
                <a href="{{ route('welcome') }}" class="btn btn-outline-secondary">Back</a>
            </div>
        </form>
    </div>
@stop
