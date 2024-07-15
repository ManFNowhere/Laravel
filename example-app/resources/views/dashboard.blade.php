@extends('layouts.main')

@section('main')
<div class="container-fluid d-flex">
    <div class="row p-5 bg-secondary">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 text-light" href="create-post">
                    <span class="material-symbols-outlined">add_circle</span>Create
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 text-light" onclick="showArticles()" >
                    <span class="material-symbols-outlined">Description</span>Your articles
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 text-light" onclick="showTables()">
                    <span class="material-symbols-outlined">Database</span>Your tables
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 text-light" href="/profile">
                    <span class="material-symbols-outlined">person</span>Profile
                </a>
            </li>
            <hr class="bg-light">
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 text-light" href="/logout">
                    <span class="material-symbols-outlined">logout</span>Logout
                </a>
            </li>
        </ul>
    </div>
    
    <div class="d-flex flex-grow-1">
        <div class="row col-md-6 mt-2 mx-auto" id="posts" style="display:{{ (session('tableOpened') ? 'none':'block') }}">
                <h2>Your Articles</h2>
                @if(session()->has('postDeleted'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('postDeleted') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @foreach ($posts as $post)
                <div class="mt-3">
                    <div class="card mb-3">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">{{$post->title }}</h5>
                            <div class="d-flex">
                                <a href="/post-edit/{{$post->slug}}" class="btn btn-warning me-2">
                                    <span class="material-symbols-outlined">edit</span> 
                                </a>
                                <form action="/post-delete/{{$post->slug}}" method="post">
                                @csrf
                                    <button class="btn btn-danger">
                                        <span class="material-symbols-outlined">delete</span> 
                                    </button>  
                                </form>
                            </div>          
                        </div>
                    </div>
                </div>
                @endforeach
        </div>

        <div class="row col-md-6 mt-2 mx-auto" id="table" style="display:{{ (session('tableOpened') ? 'block':'none') }}">
                <h2>Your saved Table</h2>
                @foreach ($tables as $table)
                <div class="mt-3">
                    <div class="card mb-3">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">{{$table->table_name}}</h5>
                            <div class="d-flex">
                                <a href="/show-table/{{$table->table_name}}" class="btn btn-success me-2">
                                    <span class="material-symbols-outlined">visibility
                                    </span> 
                                </a>
                            </div>          
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
</div>


<script>
     function showArticles() {
        document.getElementById('posts').style.display = 'block'; 
        document.getElementById('table').style.display = 'none'; 
    }

    function showTables() {
        document.getElementById('table').style.display = 'block'; 
        document.getElementById('posts').style.display = 'none'; 
    }
</script>
@endsection
