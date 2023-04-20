@extends('dashboard.layouts.main')
@section('container')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <article class="pb-2">
                <h2 class="pb-3">{{ $post->title }}</h2>
                <img src="https://source.unsplash.com/1000x500?{{ $post->category->name }}" class="card-img-top pb-2" alt="...">
                <p>By: <a href="/blog?user={{ $post->user->slug }}" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
                {!! $post->body !!}
            </article>
        </div>
    </div>
</div>
@endsection