@extends('layouts.main')

@section('container')
   <div class="main">
   @auth
      <h2>Wellcome back {{ auth()->user()->name }}!</h2>
   @else
      <h2>Wellcome to my firstApp!</h2>
   @endauth
   </div>
@endsection