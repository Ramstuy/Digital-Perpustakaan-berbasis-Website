@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-start px-5" style="margin-top: 100px;">
    <a href="/categories" type="button" class="btn btn-secondary ml-2"><i class="bi bi-arrow-return-right me-2"></i>Back</a>
</div>

<div class="container">
<h1 class="text-center mb-5"><span class="badge bg-secondary">{{ $category }}</span></h1>
</div>
@if ($books->count())
<div class="container">
    <div class="row row-cols-lg-5">
        @foreach ($books as $book)
        <div class="col-lg-2">
            <div class="card mb-4">
                <img src="{{ asset('storage/' . $book->cover) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="/categories/{{ $book->category->slug }}"><span class="badge text-bg-secondary">{{ $book->category->name }}</span></a>
                    <h5 class="card-title mt-1">{{ $book->title }}</h5>
                    <a href="/book/{{ $book->slug }}" type="button" class="btn btn-outline-secondary btn-bottom-left">Read more</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@else
<h4 class="mt-5 text-center">None of the books match this category.</h4>
@endif
@endsection