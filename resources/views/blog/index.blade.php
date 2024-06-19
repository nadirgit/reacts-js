@extends('layouts.blog')
@section('content')
    <div class="container mt-2">
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="card-title"><a href="{{ route('post_details', $post->slug) }}">{{ $post->title }}</a></h5>
                                    <p class="card-text">{{ Str::limit($post->excerpt, 150) }}</p>
                                </div>
                                <div class="col-md-4">
                                    <img src="{{$post->cover_image}}" width="100%" alt="post image">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container">
        {{ $posts }}
    </div>


@endsection
