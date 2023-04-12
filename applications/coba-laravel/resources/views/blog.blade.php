@extends('layouts.main')
@section('container')
@foreach ($posts as $post)
<article class="pb-3">
    <h2><a href="/posts/{{ $post['slug'] }}">{{ $post['judul'] }}</a></h2>
    <p>{{ $post['isi'] }}</p>
</article>
@endforeach
@endsection