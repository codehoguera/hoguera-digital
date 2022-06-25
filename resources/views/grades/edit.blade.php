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
    <div class="content p-4">
        <div class="row">
            <div class="col-md-6">
                @if (session('messages'))
                    <div class="alert alert-success">
                        <p><strong>{{ session('messages') }}</strong></p>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="form" action="{{ route('grades.update', $grade->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="name_grade" class="form-label">Nombre de Grado</label>
                        <input type="text" class="form-control" id="name_grade" name="name_grade" placeholder="" value="{{ $grade->name_grade }}">
                    </div>
                    <div class="mb-3">
                        <label for="cycle" class="form-label">Ciclo</label>
                        <input type="cycle" class="form-control" id="cycle" name="cycle" placeholder="" value="{{ $grade->cycle }}">
                    </div>
                    <div class="mb-3">
                        <label for="cover" class="form-label">Cover</label>
                        <input type="cover" class="form-control" id="cover" name="cover" placeholder="" value="{{ $grade->cover }}">
                    </div>
                    <div class="d-grid gap-2">
                        <input hr  type="submit" class="btn btn-primary" value="Guardar Datos">
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                
            </div>
        </div>
    </div>
@endsection