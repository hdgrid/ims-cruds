<x-layout>

    <div class="content">
        <h2>Editar proveedor</h2>
        <form method="POST" action="{{ route('suppliers.update', $supplier->id) }}">
            @csrf
            @method('PUT')

            <label for="nombre">Nombre</label>
            <input type="text" id="name" name="name" maxlength="255" value="{{$supplier->name}}">

            <label for="direccion">Direccion</label>
            <input type="text" id="address" name="address" maxlength="255" value="{{$supplier->address}}">

            <label for="numero_contacto">Numero de contacto</label>
            <input type="text" id="contact_phone" maxlength="20" name="contact_phone" value="{{$supplier->contact_phone}}">

            <button type="submit">Guardar</button>
        </form>
    </div>

    <script src="{{ asset('javascript/script.js') }}"></script>

</x-layout>