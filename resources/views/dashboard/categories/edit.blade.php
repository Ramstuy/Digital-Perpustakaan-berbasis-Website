@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-3 py-2 mb-4 border-bottom">
    <h1 class="h2">Edit Category</h1>
</div>

  <div class="col-lg-8">
      <form method="POST" action="/dashboard/categories/{{ $category->slug }}">
        @method('put')
          @csrf
        <div class="mb-3">
          <label for="name" class="form-label @error('name') is-invalid @enderror">Name</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $category->name) }}">
        </div>
        @error('name')
          <div class="invalid-feedback d-block mb-3">{{ $message }}</div>
        @enderror

        <div class="mb-3">
          <label for="slug" class="form-label @error('slug') is-invalid @enderror">Slug</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $category->slug) }}">
        </div>
        @error('slug')
          <div class="invalid-feedback d-block mb-3">{{ $message }}</div>
        @enderror
      
        <a href="/dashboard/categories" class="btn btn-secondary">Close</a>
        <button type="submit" class="btn btn-success">Update Category</button>
      </form>
  </div>

<script>
        const title = document.querySelector("#name");
        const slug = document.querySelector("#slug");

        title.addEventListener("keyup", function() {
            let preslug = title.value;
            preslug = preslug.replace(/ /g,"-");
            slug.value = preslug.toLowerCase();
        });

</script>
@endsection