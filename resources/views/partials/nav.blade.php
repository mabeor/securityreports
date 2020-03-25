<nav>
	<ul>
		<li>
			<a href="{{ route('inicio') }}">Inicio</a>
		</li>
		<li>
			<a href="#">Formularios</a>
			<ul>
				@if (Auth::user()->hasRole('Supervisor') || Auth::user()->hasRole('Administrador'))
				<a href="#">Cierres y aperturas de cuenta</a>
					<ul>
						<li>
							<a href="{{ route('aperturas.create') }}">Crear aperturas de cuenta</a>
						</li>
						<li>
							<a href="{{ route('cierres.create') }}">Crear cierres de cuenta</a>
						</li>
					</ul>
				@endif
			</ul>

		</li>

		@if (Auth::user()->hasRole('Administrador'))
		<li>
			<a href="#">Reportes</a>
				<ul>
					<a href="#">Cierres y aperturas de cuenta</a>
					<ul>
						<li>
							<a href="{{ route('aperturas.index') }}">Buscar aperturas de cuenta</a>
						</li>
					</ul>
					<ul>
						<li>
							<a href="{{ route('cierres.index') }}">Buscar cierres de cuenta</a>
						</li>
					</ul>
				</ul>
		</li>
		@endif

		<li>
			{{ auth() -> user() -> name }}
			<ul>
				@if (Auth::user()->hasRole('Administrador'))
				<li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Nuevo usuario</a>
                </li>
                @endif
				<li>
					<a class="dropdown-item" href="{{ route('logout') }}"
		               onclick="event.preventDefault();
		                             document.getElementById('logout-form').submit();">
		            Cerrar sesion
		            </a>
		            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		                @csrf
		            </form>
				</li>
			</ul>
		</li>
	</ul>
</nav>