@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-center" style="margin-top: 100px;">
    <div class="col-lg-5">

    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

    @if (session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    
          <main class="form-signin mt-5">
            <h1 class="h3 mb-3 fw-normal text-center">Login</h1>
            <form action="/login" method="post" class="mx-auto" style="max-width: 300px;">
              @csrf
              <div class="form-floating">
                <input type="text" name="username" class="form-control custom-input @error('username') is-invalid @enderror" id="username" placeholder="username" autofocus required value="{{ old('username') }}">
                <label for="username">Username</label>
              </div>
              @error('username')
                <div class="invalid-feedback d-block mb-3">{{ $message }}</div>
              @enderror
              
              <div class="form-floating mt-2">
                <input type="password" name="password" class="form-control custom-input" id="password" placeholder="Password" required>
                <label for="password">Password</label>
              </div>
      
              <button class="btn btn-dark custom-btn w-100 py-2 mt-4" type="submit">Login</button>
            </form>
            <small class="d-block text-center mt-3">Not registered? <a href="/register">Register now!</a></small>
          </main>
        </div>
      </div>
@endsection