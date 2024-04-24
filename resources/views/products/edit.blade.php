<x-layout>
    <div class="content">
        <h2>Editar producto</h2>
        <form method="POST" action="{{ route('products.update', $product->id) }}">
            @csrf
            @method('PUT')
            
            <label for="name">Nombre</label>
            <input type="text" id="name" name="name" value="{{ $product->name }}">

            <label for="category_id">Categoría</label>
            <select id="category_id" name="category_id">
                <option value="">Seleccionar categoría</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>

            <label for="supplier_id">Proveedor</label>
            <select id="supplier_id" name="supplier_id">
                <option value="">Seleccionar proveedor</option>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ $product->suppliers->contains($supplier) ? 'selected' : '' }}>{{ $supplier->name }}</option>
                @endforeach
            </select>

            <label for="base_cost">Costo base</label>
            <input type="number" id="base_cost" name="base_cost" step="0.0001" value="{{ $product->base_cost }}">

            <label for="base_price">Precio base</label>
            <input type="number" id="base_price" name="base_price" step="0.0001" value="{{ $product->base_price }}">

            <label for="description">Descripción</label>
            <textarea id="description" name="description">{{ $product->description }}</textarea>

            <button type="submit">Guardar</button>
        </form>
    </div>

    <script src="{{ asset('javascript/script.js') }}"></script>
        
</x-layout>