<nav class="navbar navbar-expand-lg bg-body">
  <div class="container-fluid">
  <a class="navbar-brand" href="/">First App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{($title === 'Home') ? 'active' : '' }}" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{($title === 'Weather') ? 'active' : '' }}" href="/weather">Weather</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{($title === 'Articles') ? 'active' : '' }}" href="/posts">Articles</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
      @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Hi, {{ auth()->user()->name }}!
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/create-post">Create Post</a></li>  
            <li><a class="dropdown-item" href="/profile">Profile</a></li>
            <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>  
            <li><form action="/logout" method="Post">
              @csrf
              <button class="dropdown-item" type="submit">Logout</button>
            </form></li>
          </ul>
        </li>
      @else
          <li class="nav-item ">
            <a class="nav-link" href="/login">Login</a>
          </li>
      @endauth
      </ul>
    </div>
  </div>
</nav>