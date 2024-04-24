<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{ asset('css/style.css') }}>
    <link rel="stylesheet" href={{ asset('javascript/script.js') }}>
    <script src="https://kit.fontawesome.com/ee7f5d0ada.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">

        <div class="sidebar">
            <ul>
                <li class><a href="#">Dashboard</a></li>
                <!-- -->
                <li class="sidebar__dropdown">
                    <a href="#">
                        Productos
                        <span class="fa fa-caret-down"></span>
                    </a>
                    <div class="sidebar__submenu">
                        <ul>
                            <li class="sidebar__subitem"><a href="{{ route('products.create') }}">Agregar producto</a></li>
                            <li class="sidebar__subitem"><a href="{{ route('products.index') }}">Administrar productos</a></li>
                        </ul>
                    </div>
                </li>
                <!-- -->
                <li class="sidebar__dropdown">
                    <a href="#">
                        Categorías
                        <span class="fa fa-caret-down"></span>
                    </a>
                    <div class="sidebar__submenu">
                        <ul>
                            <li class="sidebar__subitem"><a href="{{ route('categories.create') }}">Agregar categoria</a></li>
                            <li class="sidebar__subitem"><a href="{{ route('categories.index') }}">Administrar categorias</a></li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar__dropdown">
                    <a href="#">
                        Proveedores
                        <span class="fa fa-caret-down"></span>
                    </a>
                    <div class="sidebar__submenu">
                        <ul>
                            <li class="sidebar__subitem"><a href="{{ route('suppliers.create') }}">Agregar proveedor</a></li>
                            <li class="sidebar__subitem"><a href="{{ route('suppliers.index') }}">Administrar proveedores</a></li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar__dropdown">
                    <a href="#">
                        Usuarios
                        <span class="fa fa-caret-down"></span>
                    </a>
                    <div class="sidebar__submenu">
                        <ul>
                            <li class="sidebar__subitem"><a href="{{ route('users.create') }}">Agregar usuario</a></li>
                            <li class="sidebar__subitem"><a href="{{ route('users.index') }}">Administrar usuarios</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="#">Bitácora</a></li>
            </ul>
        </div>

        {{ $slot }}

    </div>
<body>
<html>
