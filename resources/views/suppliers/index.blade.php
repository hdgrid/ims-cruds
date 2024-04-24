<x-layout>
    
    <div class="content">
        <h2 class="content__title">Administrar proveedores</h2>
        <div class="filters">
                <form method="get" action=" {{ route('suppliers.search') }} " class="search-form">
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
                    <th class="table__cell table__cell--header">Direccion</th>
                    <th class="table__cell table__cell--header">Numero de contacto</th>
                    <th class="table__cell table__cell--header">Acciones</th>
                </tr>
            </thead>
            <tbody class="table__body">
                @foreach($suppliers as $supplier)
                <tr class="table__row">
                    <td class="table__cell">{{ $supplier->name }}</td>
                    <td class="table__cell">{{ $supplier->address }}</td>
                    <td class="table__cell">{{ $supplier->contact_phone }}</td>
                    <td class="table__cell">
                        <a href="{{ route('suppliers.edit', $supplier->id) }}" class="table__button">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" class="d-inline">
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