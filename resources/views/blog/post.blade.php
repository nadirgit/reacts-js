@extends('layouts.blog')

@section('content')
<div class="container mt-2 ">
    <div class="card">
        <div class="card-body">
            <h3>{{ $post->title}}</h3>
            <img src="{{$post->cover_image }}" class="img-fluid mb-3" alt="post image">
            <p>{{ $post->body}}</p>
        </div>
    </div>

    <h4>Comments</h4>
    @forelse ($post->comments as $comment)
        <div class="card mb-2">
            <div class="card-body">
                <p>{{ $comment->body }}</p>
                <small>By {{ $comment->user->name }} on {{ $comment->created_at->toFormattedDateString() }}</small>
            </div>
        </div>
    @empty
        <p>No comments yet.</p>
    @endforelse
</div>
@endsection
