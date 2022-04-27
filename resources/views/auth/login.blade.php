@extends('layouts.app')
@section('title', 'Login')
@section('content')
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    <li>{{ $error }}</li>
                </div>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <input type="email" name="email" id="email" placeholder="name@example.com" value="{{ old('email') }}">
        <input type="password" name="password" id="password" placeholder="*******">
        <input class="btn btn-primary" type="submit" value="Login">
        <a href="{{ url('/login-google') }}" class="btn btn-primary">Inicia sesión con Google</a>
        <a href="{{ url('/login-facebook') }}" class="btn btn-primary">Inicia sesión con Facebook</a>
    </form>
@endsection
