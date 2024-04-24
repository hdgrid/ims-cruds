<x-layout>
    <div class="content">
        <h2>Editar usuario</h2>
        <form method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT')

            <label for="nombre">Nombre</label>
            <input type="text" id="name" name="name" maxlength="255" value="{{$user->name}}">

            <label for="apellido">Apellido</label>
            <input type="text" id="last_name" name="last_name" maxlength="255" value="{{$user->last_name}}">

            <label for="contra">Contraseña</label>
            <input type="text" id="password" maxlength="255" name="password" value="{{$user->password}}">

            <label for="correo">Correo Electronico</label>
            <input type="text" id="email" maxlength="255" name="email" value="{{$user->email}}">
			
			<label for="role_id">Rol</label>
            <select id="role_id" name="role_id">
                <option value="">Seleccionar categoría</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                @endforeach
            </select>
			
			<button type="submit">Guardar</button>
        </form>
    </div>

    <script src="{{ asset('javascript/script.js') }}"></script>

</x-layout>