@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-3 py-2 mb-4 border-bottom">
    <h1 class="h2">Welcome back, {{ auth()->user()->name }}</h1>
    {{-- <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
      </div>
    </div> --}}
  </div>
@endsection