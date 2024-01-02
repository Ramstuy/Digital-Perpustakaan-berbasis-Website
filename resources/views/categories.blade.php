@extends('layouts.main')

@section('container')
<div class="container" style="margin-top: 100px;">
{{-- <button type="button" class="btn btn-success mt-5 ms-5"><i class="bi bi-journal-plus"></i>    Add new category</button> --}}

<h1 class="mt-5 text-center mb-5">Category List</h1>
</div>
@if ($categories->count())
<div class="container">
    <div class="row row-cols-lg-5">
        @foreach ($categories as $category)
        <a href="/categories/{{ $category->slug }}">
            <div class="card text-bg-dark text-white mt-4">
                <img src="https://source.unsplash.com/500x500?{{ $category->name }}" class="card-img" alt="{{ $category->name }}">
                <div class="card-img-overlay d-flex align-items-center p-0">
                <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0, 0, 0, 0.5)">{{ $category->name }}</h5>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
@else
<h4 class="mt-5 text-center">Category not found</h4>
@endif
@endsection