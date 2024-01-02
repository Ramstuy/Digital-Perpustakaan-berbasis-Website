@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-3 py-2 mb-4 border-bottom">
    <h1 class="h2">Add New Book</h1>
</div>

  <div class="col-lg-8">
      <form method="POST" action="/dashboard/books" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="imageInput" class="form-label @error('cover') is-invalid @enderror">Book Cover<small class="ms-2">*(jpg, png, jpeg, webp. max 2 MB)</small></label>
            <div class="d-flex align-items-center">
              <input class="form-control @error('cover') is-invalid @enderror" type="file" id="cover" name="cover" onchange="previewImage()" accept=".png, .jpg, .jpeg, .webp">
            </div>
            <img class="img-preview img-fluid mt-3" id="preview" style="object fit: cover; max-width: 100%; max-height: 250px;">
          </div>
          @error('cover')
            <div class="invalid-feedback d-block mb-3">{{ $message }}</div>
          @enderror
        

        <div class="mb-3">
          <label for="title" class="form-label @error('title') is-invalid @enderror">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
        </div>
        @error('title')
          <div class="invalid-feedback d-block mb-3">{{ $message }}</div>
        @enderror

        <div class="mb-3">
          <label for="slug" class="form-label @error('slug') is-invalid @enderror">Slug</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}">
        </div>
        @error('slug')
          <div class="invalid-feedback d-block mb-3">{{ $message }}</div>
        @enderror

        <div class="mb-3">
          <label for="quantity" class="form-label @error('quantity') is-invalid @enderror">Quantity</label>
          <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ old('quantity') }}">
        </div>
        @error('quantity')
          <div class="invalid-feedback d-block mb-3">{{ $message }}</div>
        @enderror

        <div class="mb-3">
          <label for="category" class="form-label @error('category_id') is-invalid @enderror">Category</label>
          <select class="form-select mb-3 @error('category_id') is-invalid @enderror" name="category_id">
            @foreach ($categories as $category)
              <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
              </option>
            @endforeach
          </select>
          @error('category_id')
            <div class="invalid-feedback d-block mb-3">{{ $message }}</div>
          @enderror
        </div>
        
        <div class="mb-3">
          <label for="Textarea" class="form-label @error('description') is-invalid @enderror">Description</label>
          <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
          @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        
        <div class="mb-3">
          <label for="formFile" class="form-label @error('file') is-invalid @enderror">Upload PDF<small class="ms-2">*(format file PDF only)</small></label>
          <input class="form-control @error('file') is-invalid @enderror" type="file" id="formFile" name="file" accept="application/pdf">
      </div>
      @error('file')
          <div class="invalid-feedback d-block mb-3">{{ $message }}</div>
      @enderror
      
        <a href="/dashboard/books" class="btn btn-secondary">Close</a>
        <button type="submit" class="btn btn-success">Submit Book</button>
      </form>
  </div>

<script>
        const title = document.querySelector("#title");
        const slug = document.querySelector("#slug");

        title.addEventListener("keyup", function() {
            let preslug = title.value;
            preslug = preslug.replace(/ /g,"-");
            slug.value = preslug.toLowerCase();
        });

        function previewImage() {
          const image = document.querySelector('#cover')
          const imgPreview = document.querySelector('.img-preview')
          imgPreview.style.display = 'block';
  
          const ofReader = new FileReader();
          ofReader.readAsDataURL(image.files[0]);
  
          ofReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
          }
        }

</script>
@endsection