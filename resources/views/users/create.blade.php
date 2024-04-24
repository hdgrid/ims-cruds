<x-layout>

    <div class="content">
        <h2>Agregar usuario</h2>
        
	<form method="POST" action="{{ route('users.store') }}">
            @csrf

            <label for="nombre">Nombre</label>
            <input type="text" id="name" name="name" maxlength="255">

            <label for="last_name">Apellido</label>
            <input type="text" id="last_name" name="last_name" maxlength="255">

			<label for="contra">Contraseña</label>
            <input type="text" id="password" name="password" maxlength="255">
			
            <label for="numero_contacto">Correo Electronico</label>
            <input type="text" id="email" name="email" maxlength="255">
			
			<label for="rol">Rol</label>
            <select id="role_id" name="role_id">
                <option value="">Seleccionar rol</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ in_array($role->id, old('role_ids', [])) ? 'selected' : '' }}>{{ $role->name }}</option>
                @endforeach
            </select>

            <button type="submit">Guardar</button>
        </form>
    </div>

    <script src="{{ asset('javascript/script.js') }}"></script>

</x-layout>