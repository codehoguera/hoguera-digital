@extends('layouts.app')
@section('title', 'Wellcome')
@section('content')

    @if (auth()->user()->userDate->change_password  == true)
        <h1>{{ __('Wellcome') }}</h1>
    @elseif(auth()->user()->userDate->change_password == false)
        <div class="content p-4">
            <div class="row">
                <div class="col-md-6">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('messages'))
                    <div class="alert alert-success">
                        <p><strong>{{ session('messages') }}</strong></p>
                    </div>
                    @endif
                    <form class="form" action="{{ route('home') }}" method="POST">
                        @method('patch')
                        @csrf
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input type="password" class="form-control" id="password" name="password"value="">
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"value="">
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
                            <a class="btn btn-primary" href="{{ route('create') }}">Siguiente</a>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    
                </div>
            </div>
        </div>
    @endif
        
@endsection