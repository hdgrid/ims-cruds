<x-layout>
    
    <div class="content">
        <h2 class="content__title">Administrar Productos</h2>
        <div class="filters">
                <form method="get" action="{{ route('products.search') }}" class="search-form">
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
                    <th class="table__cell table__cell--header">Precio de venta</th>
                    <th class="table__cell table__cell--header">Costo de producto</th>
                    <th class="table__cell table__cell--header">Descripción</th>
                    <th class="table__cell table__cell--header">Categoría</th>
                    <th class="table__cell table__cell--header">Proveedor</th>
                    <th class="table__cell table__cell--header">Acciones</th>
                </tr>
            </thead>
            <tbody class="table__body">
                @foreach($products as $product)
                <tr class="table__row">
                    <td class="table__cell">{{ $product->name }}</td>
                    <td class="table__cell">{{ $product->base_price }}</td>
                    <td class="table__cell">{{ $product->base_cost }}</td>
                    <td class="table__cell">{{ Str::limit($product->description, 50) }}</td>
                    <td class="table__cell">{{ $product->category->name }}</td>
                    <td class="table__cell">
                        @forelse($product->suppliers as $supplier)
                            <span class="supplier">{{ $supplier->name }}</span>
                        @empty
                            N/A
                        @endforelse
                    </td>
                    <td class="table__cell">
                        <a href="{{ route('products.edit', $product->id) }}" class="table__button">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
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