@extends('layouts.main')
@section('container')
<h1 class="mb-5">Categories</h1>

<div class="container">
    <div class="row">
        @foreach ($categories as $category)
        <div class="col-md">
            <a href="/blog?category={{ $category->slug }}" class="text-decoration-none">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="https://source.unsplash.com/1000x800?{{ $category->name }}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8 text-center d-flex align-items-center">
                            <div class="card-body">
                                <h4 class="card-title">{{ $category->name }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection