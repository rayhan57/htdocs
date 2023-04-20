@extends('dashboard.layouts.main')
@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Posts</h1>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="table-responsive">
        <a href="/dashboard/posts/create" class="btn btn-success"><span data-feather="plus-square"></span> Add Post</a>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($posts as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->title }}</td>
                    <td>{{ $p->category->name }}</td>
                    <td>
                        <a href="/dashboard/posts/{{ $p->slug }}" class="btn btn-info btn-sm"><span data-feather="eye"></span></a>
                        <a href="" class="btn btn-warning btn-sm"><span data-feather="edit"></span></a>
                        <a href="" class="btn btn-danger btn-sm"><span data-feather="trash"></span></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection