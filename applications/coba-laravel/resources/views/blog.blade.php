@extends('layouts.main')
@section('container')
<h1 class="mb-4">{{ $title }}</h1>

<div class="row">
    <div class="col-md">
        <form action="/blog" method="GET">
            @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if (request('user'))
            <input type="hidden" name="user" value="{{ request('user') }}">
            @endif
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search Posts..." name="search" value="{{ request('search') }}" autocomplete="off">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </div>
        </form>
    </div>
</div>

@if ($posts->count())
<div class="card mb-4">
    <img src="https://source.unsplash.com/1000x300?{{ $posts[0]->category->name }}" class="card-img-top" alt="...">
    <div class="card-body">
        <h4 class="card-title">{{ $posts[0]->title }}</h4>
        <p>By: <a href="/blog?user={{ $posts[0]->user->slug }}" class="text-decoration-none">{{ $posts[0]->user->name }}</a> in <a href="/blog?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a></p>
        <p class="card-text">{{ $posts[0]->excerpt }}</p>
        <a href="/posts/{{ $posts[0]->slug }}" class="btn btn-primary">Read more</a>
        <p class="card-text"><small class="text-body-secondary">{{ $posts[0]->created_at->diffForHumans() }}</small></p>
    </div>
</div>

<div class="container">
    <div class="row">
        @foreach($posts->skip(1) as $post)
        <div class="col-md-4">
            <div class="card mb-3">
                <img src="https://source.unsplash.com/1000x500?{{ $post->category->name }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p>By: <a href="/blog?user={{ $post->user->slug }}" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
                    <p class="card-text">{{ $post->excerpt }}</p>
                    <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read more</a>
                    <p class="card-text"><small class="text-body-secondary">{{ $post->created_at->diffForHumans() }}</small></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@else
<p class="fs-4 position-absolute top-50 start-50 translate-middle">No post found.</p>
@endif
<div class="d-flex justify-content-center">
    {{ $posts->links() }}
</div>
@endsection