@extends('layouts.app')
@section('title', 'Home')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
<style>

.form-search-index {
    width: 300px;
}

</style>
@endsection
@section('content')

  @foreach ($roles as $role)
    <div class="card text-center" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">{{ $role->name }}</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="{{ route('users.create', $role->id) }}" class="btn btn-primary">CREAR</a>
    </div>
  @endforeach

@endsection



