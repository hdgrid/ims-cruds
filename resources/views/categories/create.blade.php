<x-layout>

    <div class="content">
        <h2>Agregar Categoria</h2>
        <form method="POST" action="{{ route('categories.store') }}">
            @csrf

            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="name">

            <button type="submit">Guardar</button>
        </form>
    </div>

    <script src="{{ asset('javascript/script.js') }}"></script>

</x-layout>