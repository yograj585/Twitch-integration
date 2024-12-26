<!-- resources/views/posts/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if(Auth::user() && Auth::user()->isAdmin())
        <a href="{{ route('posts.create') }}">Create New Post</a>
    @endif
    <ul>
        @foreach($posts as $post)
            <li>
                <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                @if(Auth::user() && Auth::user()->isAdmin())
                    <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>
@endsection
