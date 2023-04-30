@extends('layouts.main')
@section('container')
<div class="row justify-content-center mt-5">
    <div class="col-md-5">
        <main class="form-register">
            <form action="/register" method="POST">
                <h1 class="h3 mb-3 fw-normal text-center">Please Register</h1>
                @csrf

                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name" name="name" value="{{ old('name') }}" />
                    <label for="name">Name</label>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" name="email" value="{{ old('email') }}" />
                    <label for="email">Email address</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" />
                    <label for="password">Password</label>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button class="w-100 btn btn-lg btn-info" type="submit">Register</button>
                <p class="text-center mt-2">Already have an account? <a href="/login">Please login</a></p>
                <p class="mt-4 mb-3 text-body-secondary">&copy; 2023. Rayhan Lingga Buana</p>
            </form>
        </main>
    </div>
</div>
@endsection