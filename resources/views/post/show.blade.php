@extends('layout.master')

@section('content')

    <h1 class="text-center my-4">Show Post</h1>

    <div class="col-md-12">
        <x-error-messages/>
    </div>

    <div class="d-flex justify-content-center">
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
    </div>

    <form method="post" action="{{ route('posts.destroy', $post->uuid) }}" class="d-flex justify-content-center">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-outline-danger">Delete</button>
    </form>
    <hr>

    <h2 class="text-center mb-4">Change Status of Post</h2>

    <div class="d-flex justify-content-center">

        <form method="post" action="{{ route('posts.state.update', $post) }}">
            @csrf
            @method('patch')
            @foreach($post->getNextResources() as $next)
                @if(in_array(auth()->user()->role, $next['roles']))
                    <button type="submit" name="state" class="btn btn-outline-{{ $next['color'] }}"
                            value="{{ $next['title'] }}">
                        {{ $next['title'] }}
                    </button>
                @endif
            @endforeach
        </form>

    </div>

@stop
