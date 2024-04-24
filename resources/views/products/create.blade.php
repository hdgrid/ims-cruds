<x-layout>

    <div class="content">
        <h2>Agregar Producto</h2>
        <form method="POST" action="{{ route('products.store') }}">
            @csrf

            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="name">

            <label for="categoria">Categoría</label>
            <select id="categoria" name="category_id">
                <option value="">Seleccionar categoría</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <label for="proveedor">Proveedor</label>
            <select id="proveedor" name="supplier_id">
                <option value="">Seleccionar proveedor</option>
                @foreach ($suppliers as $supplier)
                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
            </select>

            <label for="costo">Costo base</label>
            <input type="number" id="base_cost" name="base_cost" step="0.0001">

            <label for="precio">Precio base</label>
            <input type="number" id="base_price" name="base_price" step="0.0001">

            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="description"></textarea>

            <button type="submit">Guardar</button>
        </form>
    </div>

    <script src="{{ asset('javascript/script.js') }}"></script>

</x-layout>