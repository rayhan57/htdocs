@extends('layouts.main')
@section('container')
<h1>User list : {{ $user }}</h1>
@foreach ($posts as $post)
<article class="pb-3">
    <h2><a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a></h2>
    <p>{{ $post->excerpt }}</p>
</article>
@endforeach
@endsection