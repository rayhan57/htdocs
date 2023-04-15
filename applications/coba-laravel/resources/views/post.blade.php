@extends('layouts.main')
@section('container')    
<article class="pb-3">
    <h2>{{ $post->title }}</h2>
    <p>By: Rayhan in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
    {!! $post->body !!}
</article>
@endsection
