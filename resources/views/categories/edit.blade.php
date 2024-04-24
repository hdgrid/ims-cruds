<x-layout>

    <div class="content">
        <h2>Editar Categoria</h2>
        <form method="POST" action="{{ route('categories.update', $category->id) }}">
            @csrf
            @method('PUT')

            <label for="nombre">Nombre</label>
            <input type="text" id="name" name="name" value="{{ $category->name }}">

            <button type="submit">Guardar</button>
        </form>
    </div>

    <script src="{{ asset('javascript/script.js') }}"></script>

</x-layout>