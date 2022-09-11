<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
        <h1>test</h1>
        {{ $errors }}
        <form action="{{ url('/store') }}" method="post">
            @csrf
            title: <input type="text" name="title" class="form-control">
            body <input type="text" name="body">
            <button type="submit">Send</button>
        </form>

        @isset($post)
            {{ $post->id }}<br>
            {{ $post->title }}<br>
            {{ $post->created_at }}<br>
        @endif
    </body>
</html>
