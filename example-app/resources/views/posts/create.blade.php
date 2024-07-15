@extends('layouts.main')

@section('container')

<form action="/create-post" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" required>
    @error('title')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Image cover post</label>
    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
    @error('image')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror

  </div>
  <div class="mb-3">
    <label for="body" class="form-label">Body</label>
    <textarea type="text" name="body" class="form-control @error('body') is-invalid @enderror" id="body" required></textarea>
    @error('body')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection
