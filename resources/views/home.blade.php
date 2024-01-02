@extends('layouts.main')

@section('container')

{{-- <button type="button" class="btn btn-success mt-5 ms-5"><i class="bi bi-journal-plus"></i>    Add new book</button> --}}
<div class="container" style="margin-top: 100px;">
    <h1 class="text-center mb-5" style="margin-top: 100px;">Book List</h1>
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
<h4 class="mt-5 text-center">Book not found</h4>
@endif
<div class="d-flex justify-content-center mt-5 mb-3">
{{ $books->links() }}
</div>
@endsection