@extends('layout.master')

@section('content')

    <h1 class="text-center my-4">Update Post</h1>

    <div class="col-md-12">
        <x-error-messages/>
    </div>

    <div class="d-flex justify-content-center">

        <form action="{{ route('posts.update', $post->uuid) }}" method="post">
            @csrf
            @method('patch')
            <div class="form-group">
                <label>Title:</label>
                <input type="text" name="title" class="form-control" value="{{ $post->title }}">
            </div>

            <div class="form-group">
                <label>Body:</label>
                <textarea name="body" class="form-control" rows="10">{{ $post->body }}</textarea>
            </div>

            <div class="form-group mt-2">
                <button class="btn btn-outline-primary">Update</button>
                <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">Back</a>
            </div>
        </form>
    </div>
@stop
