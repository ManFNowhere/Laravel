@extends('layouts.main')

@section('container')
<article class="d-flex flex-column mt-4 justify-content-center">
        @if ($post->image)
                <img src="{{ asset('storage/'.$post->image)}}" class="" alt="...">
                @else
                <img src="https://source.unsplash.com/random" class="card-img-top" style="width:100%" alt="...">
                @endif
            
    <div class="col">
        <h4>{{ $post->title }}</h4>
        <p class="card-text"><small class="text-muted">By: {{$post->user->name}} | {{$post->created_at->diffForHumans()}}</small></p>
        <p>{{ $post->body }}</p>
    </div>
    <a href="/posts" class="btn btn-danger">Back</a>
</article>

@endsection

