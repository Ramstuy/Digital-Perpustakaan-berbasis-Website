@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-center" style="margin-top: 100px;">
    <div class="col-lg-5">
      <main class="form-registration mt-5">
        <h1 class="h3 mb-3 fw-normal text-center">Register</h1>
          <form action="/register" method="post">
              @csrf
            <div class="form-floating">
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
              <label for="name">Name</label>
            </div>
              @error('name')
              <div class="invalid-feedback d-block mb-3">{{ $message }}</div>
              @enderror

            <div class="form-floating mt-2">
              <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
              <label for="username">Username</label>
            </div>
              @error('username')
              <div class="invalid-feedback d-block mb-3">{{ $message }}</div>
              @enderror

            <div class="form-floating mt-2">
              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
              <label for="email">Email address</label>
            </div>
              @error('email')
              <div class="invalid-feedback d-block mb-3">{{ $message }}</div>
              @enderror

            <div class="form-floating mt-2">
              <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
              <label for="password">Password</label>
            </div>
              @error('password')
              <div class="invalid-feedback d-block mb-3">{{ $message }}</div>
              @enderror

            <button class="btn btn-dark w-100 py-2 mt-4" type="submit">Submit</button>
          </form>
          <small class="d-block text-center mt-3">Already registered? <a href="/login">Login</a></small>
      </main>
    </div>
  </div>
@endsection