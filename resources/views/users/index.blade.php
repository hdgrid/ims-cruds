<x-layout>
    
    <div class="content">
        <h2 class="content__title">Administrar usuarios</h2>
        <div class="filters">
                <form method="get" action="/search" class="search-form">
                    <label class="filters__label" for="search">Buscar:</label>
                    <div class="search-input-wrapper">
                        <input class="filters__input" type="text" name="search" placeholder="Buscar..." />
                        <button class="filters__button" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
        </div>            
            <table class="table">
            <thead class="table__header">
                <tr>
                    <th class="table__cell table__cell--header">Nombre</th>
					<th class="table__cell table__cell--header">Apellido</th>
                    <th class="table__cell table__cell--header">Rol</th>
                    <th class="table__cell table__cell--header">Correo Electronico</th>
                </tr>
            </thead>
            <tbody class="table__body">
                @foreach($users as $user)
                <tr class="table__row">
                    <td class="table__cell">{{ $user->name }}</td>
					<td class="table__cell">{{ $user->last_name }}</td>
                    <td class="table__cell">{{ $user->role->name }}</td>
                    <td class="table__cell">{{ $user->email }}</td>
                    <td class="table__cell">
                        <a href="{{ route('users.edit', $user->id) }}" class="table__button">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="table__button">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
    </div>

    <script src="{{ asset('javascript/script.js') }}"></script>

</x-layout>