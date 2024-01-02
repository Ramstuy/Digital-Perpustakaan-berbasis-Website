@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-3 py-2 mb-4 border-bottom">
    <h1 class="h2">Welcome back, <strong>{{ auth()->user()->name }}</strong></h1>
    {{-- <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
      </div>
    </div> --}}
  </div>
  <div>
    <h6>Name: <strong>{{ auth()->user()->name }}</strong></h6>
    <h6>Username: <strong>{{ auth()->user()->username }}</strong></h6>
    <h6>Email: <strong>{{ auth()->user()->email }}</strong></h6>
    <h6>Account created: <strong>{{ auth()->user()->created_at->diffForHumans() }}</strong></h6>
  </div>
@endsection