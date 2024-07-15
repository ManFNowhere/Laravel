@extends('layouts.main')


@section('container')

<main class="w-80 m-auto">
    @if (session()->has('updateSaved'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('updateSaved') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('updateError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('updateError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h2>Profile</h2>
    <form action="/profile" method="Post">
        @csrf
        <div class="mb-3 row">
            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="name" id="inputName" value="{{auth()->user()->name}}" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
            <input type="text" readonly name="email" class="form-control-plaintext" id="staticEmail" value="{{ auth()->user()->email }}" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>

</main>
@endsection