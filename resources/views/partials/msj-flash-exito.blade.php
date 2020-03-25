@if(session('status'))
    <div class="alert alert-success alert-dismissable fade show mensaje-flash" role="alert">
        {{ session('status')}}
        <!-- Boton para poder cerrar el mensaje: -->
        <button
            type="button"
            class="close"
            data-dismiss="alert"
            aria-label="Close">
            <span aria-hidden="true">&times</span>
        </button>
    </div>
@endif