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
                <div class="d-grid gap-2 col-6 mx-auto">
                    <a href="" class="btn btn-primary mb-2" type="button" >Crear Usuarios</a>
                </div>
            </div>
            <div class="card card-body">
                <table class="table table-striped" style="width:100%" id="users">
                    <thead>
                        <tr>
                            <th>Nombre del Grado</th>
                            <th>Ciclo</th>
                            <th>Cover</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grades as $grade)
                            <tr>
                                <td>{{ $grade->name_grade }}</td>
                                <td>{{ $grade->cycle }}</td>
                                <td>{{ $grade->cover }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('grades.edit', $grade->id) }}">Edit</a>
                                    <form action="" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-danger" type="submit" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection