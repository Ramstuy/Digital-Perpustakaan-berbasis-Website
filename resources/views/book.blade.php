@extends('layouts.detail')

@section('container')

<div class="d-flex justify-content-start px-5" style="margin-top: 100px;">
    <a href="/" type="button" class="btn btn-secondary"><i class="bi bi-house"></i> Back to Home</a>
</div>

<div class="container mt-5">
    <div class="container mt-3 position-relative">
        <div class="d-flex align-items-start">
            <img src="{{ asset('storage/' . $book->cover) }}" class="img-top" alt="..." />
            <div class="ms-5">
                <h6>Quantity: {{ $book->quantity }}</h6>
                <h1 class="text-start">{{ $book->title }}</h1>
                <div class="mt-0">
                    <h5><a href="/categories/{{ $book->category->slug }}"><span class="badge bg-secondary">{{ $book->category->name }}</span></a></h5>
                </div>
                <div class="mt-4">
                    <h5 class="text-start">Uploaded by: {{ $book->user->name }}</h5>
                    <h6><small>{{ $book->created_at->diffForHumans() }}</small></h6>
                    @auth
                    <a href="{{ asset('storage/' . $book->file) }}" type="button" class="btn btn-danger ml-2 mt-2" target="_blank"><i class="bi bi-filetype-pdf me-2"></i>Open PDF</a>
                    @else
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" data-placement="right" title="Need to login first">
                        <button type="button" disabled class="btn btn-danger ml-2" style="pointer-events: none"><i class="bi bi-filetype-pdf me-2"></i>Open PDF</button>
                      </span>
                    @endauth
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