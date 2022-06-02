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
                <form class="form" action="{{ route('users.store', $role->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Nombre Usuario</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="" value="{{ old('email') }}">
                    </div>
                    <div class="mb-3">
                        <label for="rol-access" class="form-label">Rol-Acceso</label>
                        <input type="text" class="form-control" id="rol-access" name=""  value="{{ $role->name }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre(s)</label>
                        <input type="name" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="mb-3">
                        <label for="first_lastname" class="form-label">Apellido Paterno</label>
                        <input type="name" class="form-control" id="first_lastname" name="first_lastname" value="{{ old('first_lastname') }}">
                    </div>
                    <div class="mb-3">
                        <label for="second_lastname" class="form-label">Apellido Materno</label>
                        <input type="name" class="form-control" id="second_lastname" name="second_lastname" value="{{ old('second_lastname') }}">
                    </div>
                    <div class="mb-3">
                        <label for="cell_personal" class="form-label">Nro. Celular Personal</label>
                        <input type="number" class="form-control" id="cell_personal" name="cell_personal" value="{{ old('cell_personal') }}">
                    </div>
                    @role('admin')
                        <div class="mb-3">
                            <label for="regional" class="form-label">Regional</label>
                            <select class="form-select" aria-label="Seleccional la Región" name="regional_id">
                                <option value="">Seleccionar la Región</option>
                                @foreach ($regionals as $regional)
                                    <option value="{{ $regional->id }}">{{ $regional->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endrole
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

