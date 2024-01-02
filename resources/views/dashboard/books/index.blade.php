@extends('dashboard.layouts.main')

@section('container')
@if(auth()->user()->is_admin == 1)
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-3 py-2 mb-4 border-bottom">
  <h1 class="h2">All Books</h1>
  <a href="{{ route('export') }}" type="button" class="btn btn-outline-success"><i class="bi bi-filetype-xlsx me-2"></i>Export to Excel</a>
</div>
@else
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-3 py-2 mb-4 border-bottom">
    <h1 class="h2">My Books</h1>
  </div>
@endif
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
      
    </div>
  </div>
  <div class="table col-lg-8">  
    <a href="/dashboard/books/create" class="btn btn-success mb-3"><i class="bi bi-journal-plus me-2"></i>Add new book</a>
    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
    <table class="table table-hover text-center">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Title</th>
          <th scope="col">Category</th>
          <th scope="col">Quantity</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($books as $book)
        <tr>
          <td >{{ $loop->iteration }}</td>
          <td class="text-start">{{ $book->title }}</td>
          <td>{{ $book->category->name }}</td>
          <td>{{ $book->quantity }}</td>
          <td>
            <a href="/dashboard/books/{{ $book->slug }}" class="btn btn-info"><i class="bi bi-eye"></i></a>
            <a href="/dashboard/books/{{ $book->slug }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
            <form action="/dashboard/books/{{ $book->slug }}" method="POST" class="d-inline">
              @method('delete')
              @csrf
              <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection