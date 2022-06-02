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
                <h1> Edit Seller</h1>
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
                <form class="form" action="{{ route('users.update', $user->id) }}" method="POST">
                    @method('patch')
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Nombre Usuario</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="" value="{{ $user->email }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="rol-access" class="form-label">Rol-Acceso</label>
                        <input type="text" class="form-control" id="rol-access" name="role_id"  value="{{ $user->roles[0]->name }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="rol-access" class="form-label">Habilitado</label>
                        <select class="form-select" aria-label="Default select example">
                            <option value="1" {{ $user->enable == 1 ? 'selected' : '' }}>Habilitado</option>
                            <option value="0" {{ $user->enable == 0 ? 'selected' : '' }}>Deshabilitado</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre(s)</label>
                        <input type="name" class="form-control" id="name" name="name" value="{{ $user->userDate->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="first_lastname" class="form-label">Apellido Paterno</label>
                        <input type="name" class="form-control" id="first_lastname" name="first_lastname" value="{{ $user->userDate->first_lastname }}">
                    </div>
                    <div class="mb-3">
                        <label for="second_lastname" class="form-label">Apellido Materno</label>
                        <input type="name" class="form-control" id="second_lastname" name="second_lastname" value="{{ $user->userDate->second_lastname }}">
                    </div>
                    <div class="mb-3">
                        <label for="nro_ci" class="form-label">Nro. C.I.</label>
                        <input type="number" class="form-control" id="nro_ci" name="nro_ci" value="{{ $user->userDate->nro_ci}}">
                    </div>
                    <div class="mb-3">
                        <label for="issued" class="form-label">Expedido</label>
                        <input type="number" class="form-control" id="issued" name="issued" value="{{ $user->userDate->issued }}">
                    </div>
                    <div class="mb-3">
                        <label for="birthday_date" class="form-label">F. de Nacimiento</label>
                        <input type="date" class="form-control" id="birthday_date" name="birthday_date" value="{{ $user->userDate->birthday_date }}">
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">Ciudad Natal</label>
                        <select class="form-select" aria-label="Seleccional la Región" name="city">
                            <option value="BENI" {{ $user->userDate->city == 'BENI' ? 'selected' : '' }}>BENI</option>
                            <option value="SANTA CRUZ" {{ $user->userDate->city == 'SANTA CRUZ' ? 'selected' : '' }}>SANTA CRUZ</option>
                            <option value="COCHABAMBA" {{ $user->userDate->city == 'COCHABAMBA' ? 'selected' : '' }}>COCHABAMBA</option>
                            <option value="CHUQUISACA" {{ $user->userDate->city == 'CHUQUISACA' ? 'selected' : '' }}>CHUQUISACA</option>
                            <option value="TARIJA" {{ $user->userDate->city == 'TARIJA' ? 'selected' : '' }}>TARIJA</option>
                            <option value="LA PAZ" {{ $user->userDate->city == 'LA PAZ' ? 'selected' : '' }}>LA PAZ</option>
                            <option value="ORURO" {{ $user->userDate->city == 'ORURO' ? 'selected' : '' }}>ORURO</option>
                            <option value="POTOSI" {{ $user->userDate->city == 'POTOSI' ? 'selected' : '' }}>POTOSI</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="addres" class="form-label">Dirección Domicilio</label>
                        <input type="text" class="form-control" id="addres" name="addres" value="{{ $user->userDate->addres }}">
                    </div>
                    <div class="mb-3">
                        <label for="landline" class="form-label">Nro. Teléfono Fijo</label>
                        <input type="number" class="form-control" id="landline" name="landline" value="{{ $user->userDate->landline }}">
                    </div>
                    <div class="mb-3">
                        <label for="cell_personal" class="form-label">Nro. Celular Personal</label>
                        <input type="number" class="form-control" id="cell_personal" name="cell_personal" value="{{ $user->userDate->cell_personal }}">
                    </div>
                    <div class="mb-3">
                        <label for="cell_work" class="form-label">Nro. Celular Trabajo</label>
                        <input type="number" class="form-control" id="cell_work" name="cell_work" value="{{ $user->userDate->cell_work }}">
                    </div>
                    <div class="mb-3">
                        <label for="email_personal" class="form-label">E-mail Personal</label>
                        <input type="email" class="form-control" id="email_personal" name="email_personal" value="{{ $user->userDate->email_personal }}">
                    </div>
                    <div class="mb-3">
                        <label for="code_sap" class="form-label">Código SAP</label>
                        <input type="text" class="form-control" id="code_sap" name="code_sap" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="code_employee_sap" class="form-label">Código Empleado SAP</label>
                        <input type="" class="form-control" id="code_employee_sap" name="code_employee_sap" disabled  value="{{ $user->userDate->code_employee_sap }}">
                    </div>
                    <div class="mb-3">
                        <label for="rol-access" class="form-label">{{ __('Regional') }}</label>
                        <select class="form-select" aria-label="Default select example">
                            <option value="1" {{ $user->userDate->regional_id == 1 ? 'selected' : '' }}>BENI</option>
                            <option value="2" {{ $user->userDate->regional_id == 2 ? 'selected' : '' }}>SANTA CRUZ</option>
                            <option value="3" {{ $user->userDate->regional_id == 3 ? 'selected' : '' }}>COCHABAMBA</option>
                            <option value="4" {{ $user->userDate->regional_id == 4 ? 'selected' : '' }}>CHUQUISACA</option>
                            <option value="5" {{ $user->userDate->regional_id == 5 ? 'selected' : '' }}>TARIJA</option>
                            <option value="6" {{ $user->userDate->regional_id == 6 ? 'selected' : '' }}>LA PAZ</option>
                            <option value="7" {{ $user->userDate->regional_id == 7 ? 'selected' : '' }}>ORURO</option>
                            <option value="8" {{ $user->userDate->regional_id == 8 ? 'selected' : '' }}>POTOSI</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Datos</button>
                </form>
            </div>
            <div class="col-md-6">
                
            </div>
        </div>
    </div>
@endsection

