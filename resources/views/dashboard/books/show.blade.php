@extends('dashboard.layouts.main')

@section('container')
<div class="container mt-5">
    <div class="container mt-3 position-relative">
        <div class="d-flex align-items-start">
            <img src="{{ asset('storage/' . $book->cover) }}" class="img-top" alt="..." style="height: 500px"/>
            <div class="ms-5">
                <h6>Quantity: {{ $book->quantity }}</h6>
                <h1 class="text-start">{{ $book->title }}</h1>
                <div class="mt-0">
                    <h5><span class="badge bg-secondary">{{ $book->category->name }}</span></h5>
                </div>
                <div class="mt-4">
                    @if(auth()->user()->is_admin == 1)
                    <h5 class="text-start">Uploaded by: {{ $book->user->name }}</h5>
                    <h6><small>{{ $book->created_at->diffForHumans() }}</small></h6>
                    @else
                    <h5 class="text-start">Uploaded: {{ $book->created_at->diffForHumans() }}</h5>
                    @endif
                    <div>
                    <a href="/dashboard/books" class="btn btn-secondary"><i class="bi bi-arrow-return-right me-2"></i>Back</a>
                    <a href="{{ asset('storage/' . $book->file) }}" target="_blank" class="btn btn-info"><i class="bi bi-filetype-pdf me-2"></i>Check PDF</a>
                    <a href="/dashboard/books/{{ $book->slug }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square me-2"></i>Edit</a>
                    <form action="/dashboard/books/{{ $book->slug }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="bi bi-trash me-2"></i>Delete</button>
                      </form>
                    </div>
                </div>
                <div class="mt-4 mb-5">
                    <h4>Description</h4>
                    <p class="text-start">{!! $book->description !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
