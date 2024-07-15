@extends('layouts.main')

@section('container')
<div class="container">
   
    @if ($posts->isEmpty())
    <h3>No articles posted!</h3>
    @else
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
            @if ($posts[0]->image)
                <img src="{{ asset('storage/'.$posts[0]->image)}}" class="img-fluid rounded-start" alt="...">
                @else
                <img src="https://source.unsplash.com/random" class="card-img-top" alt="...">
                @endif
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$posts[0]->title}}</h5>
                    <p class="card-text">{{$posts[0]->short_text}}</p>
                    <p class="card-text"><small class="text-muted">By: {{$posts[0]->user->name}} | {{$posts[0]->created_at->diffForHumans()}}</small></p>
                    <a href="/posts/{{$posts[0]->slug}}" class="btn btn-primary">Read more</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($posts->skip(1) as $post)
        <div class="col">
            <div class="card">
                @if ($post->image)
                <img src="{{ asset('storage/'.$post->image)}}" class="card-img-top" alt="...">
                @else
                <img src="https://source.unsplash.com/random" class="card-img-top" alt="...">
                @endif
            
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{$post->short_text}}</p>
                    <p class="card-text"><small class="text-muted">By: {{$post->user->name}} | {{$post->created_at->diffForHumans()}}</small></p>
                    <a href="/posts/{{$post->slug}}" class="btn btn-primary">Read more</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
   @endif
</div>
@endsection
