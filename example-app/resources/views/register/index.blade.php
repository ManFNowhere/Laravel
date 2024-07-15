@extends('layouts.main')

@section('container')

<main class="form-signin w-100 m-auto justify-content-center border rounded">
  <form action="validate" method="POST">
    @csrf
    <h1 class="h3 mb-3 fw-normal text-center">Register Form</h1>
    <div class="form-floating">
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="floatingName" name="name" placeholder=""  value="{{old('name')}}">
      <label for="name">Your Name</label>
      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-floating mt-2">
      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" value="{{old('email')}}">
      <label for="floatingInput">Email address</label>
      @error('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-floating mt-2">
      <input type="password"class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" value="">
      <label for="floatingPassword">Password</label>
      @error('password')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-floating">
      <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" value="">
      <label for="floatingPassword">Confirm password</label>
      @error('password_confirmation')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
    <p>Have already account? <a href="/login">Login here!</a></p>
  </form>
</main>

@endsection