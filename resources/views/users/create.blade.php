@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <label for="name">Nombre</label>
    <input type="name" name="name" id="name" value="{{ old('name') }}"><br><br>

    <label for="email">Correo Electrónico</label>
    <input type="email" name="email" id="email" value="{{ old('email') }}"><br><br>

    <label for="email_personal">Correo Electrónico Personal</label>
    <input type="email" name="email_personal" id="email_personal" value="{{ old('email_personal') }}"><br><br>

    <label for="first_lastname">Apellido Paterno</label>
    <input type="name" name="first_lastname" id="first_lastname" value="{{ old('first_lastname') }}"><br><br>

    <label for="second_lastname">Apellido Materno</label>
    <input type="name" name="second_lastname" id="second_lastname" value="{{ old('second_lastname') }}"><br><br>

    <label for="password">Contraseña</label>
    <input type="password" name="password" id="password" value="{{ old('password') }}"><br><br>

    <label for="email_verified_at">Verificar Contraseña</label>
    <input type="password" name="email_verified_at" id="email_verified_at" value="{{ old('email_verified_at') }}"><br><br>

    <label for="birthday_date">Fecha de Nacimiento</label>
    <input type="date" name="birthday_date" id="birthday_date" value="{{ old('birthday_date') }}"><br><br>

    <label for="cell_personal">Número Celular</label>
    <input type="number" name="cell_personal" id="cell_personal" value="{{ old('cell_personal') }}"><br><br>

    <label for="cell_personal">Ciudad Natal</label>
    <select name="" id="">
        <option value="">Santa Cruz</option>
    </select><br><br>

    <button type="submit">Save</button>
</form>