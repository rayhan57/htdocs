@extends('layouts.main')
@section('container')    
<article class="pb-3">
    <h2>{{ $post['judul'] }}</h2>
    <p>{{ $post{'isi'} }}</p>
</article>
@endsection