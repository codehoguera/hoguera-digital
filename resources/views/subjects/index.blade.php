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
                <div class="d-grid gap-2 col-6 mx-auto">
                    <a href="{{ route('grades.create') }}" class="btn btn-primary mb-2" type="button" >Crear usuario profesor</a>
                </div>
                @if (session('notification'))
                    <div class="alert alert-success">
                        <p><strong>{{ session('notification') }}</strong></p>
                    </div>
                @endif
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
                        @foreach ($subjects as $subject)
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