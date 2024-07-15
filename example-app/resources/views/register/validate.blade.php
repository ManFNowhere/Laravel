@extends('layouts.main')

@section('container')
    @if(session()->has('validateError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('validateError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
<form action="/register" method="post" class="text-center">
    @csrf
    <span class="material-symbols-outlined" style="font-size:20rem">
        verified_user
    </span>
    @php
    echo session('codeAccount');
    @endphp
  <div class="mb-3 text-center">
    <label for="code" class="form-label">Activation Code</label>
    <input type="number" class="form-control" id="code" name="code" required>
    <div class="form-text">See your email to get the code</div>
  </div>
  <button type="submit" class="btn btn-primary">Validate</button>
</form>

@endsection

