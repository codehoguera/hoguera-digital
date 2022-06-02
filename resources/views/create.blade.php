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
                <h1> Create</h1>
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
                <form class="form" action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nro_ci" class="form-label">Nro. C.I.</label>
                        <input type="number" class="form-control" id="nro_ci" name="nro_ci" value="">
                    </div>
                    <div class="mb-3">
                        <label for="issued" class="form-label">Expedido</label>
                        <select class="form-select" aria-label="Seleccional la Región" name="issued">
                            <option value="">Seleccionar Ciudad Natal</option>
                            
                            @foreach ($issueds as $issued)
                                <option value=""></option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nit" class="form-label">NIT</label>
                        <input type="number" class="form-control" id="nit" name="nit" value="">
                    </div>
                    <div class="mb-3">
                        <label for="birthday_date" class="form-label">F. de Nacimiento</label>
                        <input type="date" class="form-control" id="birthday_date" name="birthday_date" value="">
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">Ciudad Natal</label>
                        <select class="form-select" aria-label="Seleccional la Región" name="city">
                            <option value="">Seleccionar Ciudad Natal</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->name }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="addres" class="form-label">Dirección Domicilio</label>
                        <input type="text" class="form-control" id="addres" name="addres" value="">
                    </div>
                    <div class="mb-3">
                        <label for="landline" class="form-label">Nro. Teléfono Fijo</label>
                        <input type="number" class="form-control" id="landline" name="landline" value="">
                    </div>
                    <div class="mb-3">
                        <label for="cell_work" class="form-label">Nro. Celular Trabajo</label>
                        <input type="number" class="form-control" id="cell_work" name="cell_work" value="">
                    </div>
                    <div class="mb-3">
                        <label for="email_personal" class="form-label">E-mail Personal</label>
                        <input type="email" class="form-control" id="email_personal" name="email_personal" value="">
                    </div>
                    <button type="submit" class="btn btn-primary">Continuar</button>
                </form>
            </div>
            <div class="col-md-6">
                
            </div>
        </div>
    </div>
@endsection

