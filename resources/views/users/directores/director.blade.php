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
    <div class="row">
        <div class="col-sm-12">
            <div class="card-body">
                @if (session('notification'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                        <span class="alert-text"><strong>Success! </strong>{{ session('notification') }}</span>
                    </div>
                @endif
            </div>
            <form action="{{ route('users.directores.director') }}" class="d-flex mb-2 form-search-index"  method="POST">
                @csrf
                <input class="form-control me-2" type="search" placeholder="Buscar por nombre" aria-label="Search" name="query">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <form action="{{ route('users.directores.directorbysearch') }}" class="d-flex mb-2 form-search-index"  method="POST">
                @csrf
                <input class="form-control me-2" type="search" placeholder="Buscar por colegios" aria-label="Search" name="query">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <div class="card card-body">
                <table class="table table-striped" style="width:100%" id="users">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>Colegio</th>
                            <th>Asesor</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($directores as $user)
                            <tr>
                                <td>{{ $user->name.' '.$user->first_lastname.' '.$user->second_lastname }}</td>
                                <td>{{ $user->user->email }}</td>
                                <td>{{ $user->entities[0]->name_entity }}</td>
                                <th></th>
                                <td>
                                    <a class="btn btn-info" href="{{ url('/user/'.$user->id.'/edit') }}">Edit</a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $user->id }}">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>

    <script>

        $(document).ready(function(){
           var tableUsers = $('#users').DataTable({
                responsive: true,
            }).columns.adjust();

        });

    </script>
    <script src="{{ asset('js/index.js') }}"></script>
@endsection
