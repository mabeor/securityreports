<nav class="navbar navbar-dark navbar-expand-sm bg-dark shadow-lg navbar-hover">
    <div class="container"> <!--Div para centrar los elementos de la barra de menu -->
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('inicio') }}">
            {{ config('app.name') }}
            </a>
        </div>

        @auth {{-- Opciones disponibles solo al iniciar sesion --}}
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Formularios </a>

                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    @if (Auth::user()->hasRole('Supervisor') || Auth::user()->hasRole('Administrador'))
                        <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Cierres y aperturas de cuenta</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('aperturas.create') }}">Crear aperturas de cuenta</a></li>
                                <li><a class="dropdown-item" href="{{ route('cierres.create') }}">Crear cierres de cuenta</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a class="dropdown-item" href="{{ route('novedades.create') }}">Novedades</a></li>
                    @endif

                    @if (Auth::user()->hasRole('Coordinador') || Auth::user()->hasRole('Administrador'))
                        <li class="dropdown-submenu"><a class="dropdown-item" href="{{ route('prestamosgafete.create') }}">Pr&eacute;stamos de gafetes de excepci&oacute;n</a></li>
                    @endif

                    @if (Auth::user()->hasRole('Supervisor') || Auth::user()->hasRole('Coordinador') || Auth::user()->hasRole('Administrador'))
                        <li class="dropdown-submenu"><a class="dropdown-item" href="{{ route('inconsistencias.create') }}">Inconsistencias de libros</a></li>
                    @endif
                    </ul>
                </li>

                @if (Auth::user()->hasRole('Administrador'))
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reportes</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Cierres y aperturas de cuenta</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('aperturas.index') }}">Buscar aperturas de cuenta</a></li>
                                <li><a class="dropdown-item" href="{{ route('cierres.index') }}">Buscar cierres de cuenta</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a class="dropdown-item" href="{{ route('novedades.index') }}">Buscar novedades</a></li>
                        <li class="dropdown-submenu"><a class="dropdown-item" href="{{ route('prestamosgafete.index') }}">Buscar pr&eacute;stamos de gafetes de excepci&oacute;n</a></li>
                        <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Inconsistencias de libros</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('inconsistencias.index') }}">Buscar inconsistencias</a></li>
                                <li><a class="dropdown-item" href="{{ route('inconsistencias.estadisticas') }}">Estadisticas</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>

            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ auth() -> user() -> name }}</a>
                    <ul class="dropdown-menu">
                        @if (Auth::user()->hasRole('Administrador'))
                        <li><a class="dropdown-item" href="{{ route('register') }}">Nuevo usuario</a>
                        </li>
                        @endif

                        <li><a class="dropdown-item" href="{{ route('cambiarcontra') }}">Cambiar contrasena</a>
                        </li>

                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesion</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        @endauth
    </div>
</nav>