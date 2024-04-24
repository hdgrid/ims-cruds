<x-layout>

    <div class="content">
        <h2 class="content__title">Administrar Categorias</h2>
        <div class="filters">
                <form method="get" action="{{ route('categories.search') }}" class="search-form">
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
                    <th class="table__cell table__cell--header categories__actions">Acciones</th>
                </tr>
            </thead>
            <tbody class="table__body">
                @foreach($categories as $category)
                <tr class="table__row">
                    <td class="table__cell">{{ $category->name }}</td>
                    <td class="table__cell categories__actions">
                        <a href="{{ route('categories.edit', $category->id) }}" class="table__button">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form class="form__delete-element" action="{{ route('categories.destroy', $category->id) }}" method="POST">
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