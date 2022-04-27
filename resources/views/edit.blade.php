@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ url('/user/'.$user->id) }}" method="POST">
    @csrf
    @method('patch')
    <label for="name">Nombre</label>
    <input type="name" name="name" id="name" value="{{ old('name', $user_date->name) }}"><br><br>

    <label for="email">Correo Electrónico</label>
    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" disabled><br><br>
    
    <label for="first_lastname">Primer Apellido</label>
    <input type="name" name="first_lastname" id="first_lastname" value="{{ old('first_lastname', $user_date->first_lastname) }}"><br><br>

    <label for="second_lastname">Segundo Apellido</label>
    <input type="name" name="second_lastname" id="second_lastname" value="{{ old('second_lastname', $user_date->second_lastname) }}"><br><br>

    <label for="nro_ci">Cedula de indentidad</label>
    <input type="number" name="nro_ci" id="nro_ci" value="{{ old('nro_ci', $user_date->nro_ci) }}"><br><br>

    <label for="issued">Emitido(a)</label>
    <input type="number" name="issued" id="issued" value="{{ old('issued', $user_date->issued) }}"><br><br>

    <label for="nit">Nit</label>
    <input type="number" name="nit" id="nit" value="{{ old('nit', $user_date->nit) }}"><br><br>

    <label for="birthday_date">Fecha de Nacimiento</label>
    <input type="date" name="birthday_date" id="birthday_date" value="{{ old('birthday_date', $user->birthday_date) }}"><br><br>
    
    <label for="city">Ciudad</label>
    <input type="text" name="city" id="city" value="{{ old('city', $user_date->city) }}"><br><br>
   
    <label for="addres">Dirección</label>
    <input type="text" name="addres" id="addres" value="{{ old('addres', $user_date->addres) }}"><br><br>

    <label for="landline">Linea</label>
    <input type="number" name="landline" id="landline" value="{{ old('landline', $user_date->landline) }}"><br><br>

    <label for="cell_personal">Número Celular Personal</label>
    <input type="number" name="cell_personal" id="cell_personal" value="{{ old('cell_personal', $user_date->cell_personal) }}"><br><br>

    <label for="cell_work">Número Celular del Trabajo</label>
    <input type="number" name="cell_work" id="cell_work" value="{{ old('cell_work', $user_date->cell_work) }}"><br><br>

    <label for="email_personal">Email Personal</label>
    <input type="email" name="email_personal" id="email_personal" value="{{ old('email_personal', $user_date->email_personal) }}"><br><br>
    
    <label for="code_sap">Código del SAP</label>
    <input type="text" name="code_sap" id="code_sap" value="{{ old('code_sap', $user_date->code_sap) }}"><br><br>

    <label for="code_employee_sap">Código Empleado SAP</label>
    <input type="text" name="code_employee_sap" id="code_employee_sap" value="{{ old('code_employee_sap', $user_date->code_employee_sap) }}"><br><br>

    <label for="code_teacher">Código Profesor</label>
    <input type="text" name="code_teacher" id="code_teacher" value="{{ old('code_teacher', $user_date->code_teacher) }}"><br><br>

    <label for="change_password">Cambiar Contraseña</label>
    <input type="password" name="change_password" id="change_password" value="{{ old('change_password', $user_date->change_password) }}"><br><br>

    <label for="creator_user">Creador Usuario</label>
    <input type="number" name="creator_user" id="creator_user" value="{{ old('creator_user', $user_date->creator_user) }}"><br><br>

    <label for="rate">Apreciador(a)</label>
    <input type="number" name="rate" id="rate" value="{{ old('rate', $user->rate) }}"><br><br>
    
    <label for="field1">Campo 1</label>
    <input type="text" name="field1" id="field1" value="{{ old('field1', $user_date->field1) }}"><br><br>

    <label for="field2">Campo 2</label>
    <input type="text" name="field2" id="field2" value="{{ old('field2', $user_date->field2) }}"><br><br>

    <label for="field3">Campo 3</label>
    <input type="text" name="field3" id="field3" value="{{ old('field3', $user_date->field3) }}"><br><br>

    <label for="field4">Campo 4</label>
    <input type="text" name="field4" id="field4" value="{{ old('field4', $user_date->field4) }}"><br><br>

    <label for="field5">Campo 5</label>
    <input type="text" name="field5" id="field5" value="{{ old('field5', $user_date->field5) }}"><br><br>

    <label for="field6">Campo 6</label>
    <input type="text" name="field6" id="field6" value="{{ old('field6', $user_date->field6) }}"><br><br>

    <label for="field7">Campo 7</label>
    <input type="text" name="field7" id="field7" value="{{ old('field7', $user_date->field7) }}"><br><br>

    <label for="field8">Campo 8</label>
    <input type="text" name="field8" id="field8" value="{{ old('field8', $user_date->field8) }}"><br><br>

    <select name="enable" id="enable_type">
        <option value="1" {{ $user->enable == 1 ? 'selected' : '' }}>Habilitado</option>
        <option value="0" {{ $user->enable == 0 ? 'selected' : '' }}>Deshabilitado</option>
    </select>
    <button type="submit">Save</button>
</form>