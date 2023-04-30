@extends('layouts.main')
@section('container')

<div class="container">
    <div class="row">
        <div class="col-md">
            <article class="pb-3">
                <h2 class="pb-3">{{ $post->title }}</h2>
                @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top pb-2" width="1000" height="500">
                @else   
                <img src="https://source.unsplash.com/1000x500?{{ $post->category->name }}" class="card-img-top pb-2">
                @endif
                <p>By: <a href="/blog?user={{ $post->user->slug }}" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
                {!! $post->body !!}
            </article>
        </div>
    </div>
</div>
@endsection