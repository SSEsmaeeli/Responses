@extends('layout.master')

@section('content')

    <h1 class="text-center my-4">Your Posts</h1>

    <a href="{{ route('home') }}" class="btn btn-secondary">Back</a>

    <div class="d-flex justify-content-center">

        <div class="col-md-8">
            @foreach($posts as $post)
                <div class="card mb-2">
                    <div class="card-header">
                        <label>{{ $post->title }}</label>
                        <label class="badge bg-primary">{{ $post->created_at->ago() }}</label>
                        <a href="{{ route('posts.edit', $post->uuid) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                    </div>
                    <div class="card-body">
                        {{ $post->body }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop
