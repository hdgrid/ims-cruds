<x-layout>

    <div class="content">
        <h2>Agregar proveedor</h2>
        <form method="POST" action="{{ route('suppliers.store') }}">
            @csrf

            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="name" maxlength="255">

            <label for="direccion">Direccion</label>
            <input type="text" id="address" name="address" maxlength="255">

            <label for="numero_contacto">Numero de contacto</label>
            <input type="text" id="contact_phone" name="contact_phone" maxlength="20">

            <button type="submit">Guardar</button>
        </form>
    </div>

    <script src="{{ asset('javascript/script.js') }}"></script>

</x-layout>