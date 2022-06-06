<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @yield('css')
</head>
<body>
  
@if (!auth()->user() || auth()->user()->userDate->change_password == true)
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ url('/') }}">Home</a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @auth
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                System
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="{{ route('users.index') }}">Users</a></li>
                  <li><a class="dropdown-item" href="{{ route('users.directores.director') }}">Director</a></li>
                  <li><a class="dropdown-item" href="{{ route('users.teachers.teacher') }}">Teacher</a></li>
                  <li><a class="dropdown-item" href="{{ route('users.students.student') }}">Student</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Entity
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="{{ route('entities.index') }}">Hoguera</a></li>
                  <li><a class="dropdown-item" href="{{ route('entities.alpema') }}">Alpema</a></li>
              </ul>
            </li>
          </ul>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <ul class="navbar-nav float-right">
              <li class="nav-item">
                      <button class="btn btn-light">Logout</button>
              </li>
            </ul>
          </form>
          <ul class="navbar-nav float-right">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Languaje
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/language/es">Spanish</a></li>
                  <li><a class="dropdown-item" href="/language/en">English</a></li>
              </ul>
            </li>
          </ul>
          <p class="navbar-nav float-right" href="#">{{ auth()->user()->userDate->name }}</p>
        @else
        <a class="navbar-brand" href="{{ route('login') }}">Login</a>
        @endauth
      </div>
    </div>
  </nav> 
@else

@endif 


@yield('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    @yield('js')
</body>

</html>