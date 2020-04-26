@if($errors -> any())
 	<div class="alert alert-danger alert-dismissable fade show mensaje-flash" role="alert">
		<div class="mensaje">
            @foreach($errors -> all() as $error)
				{{ $error }} <br>
			@endforeach
        </div>
		<button
            type="button"
            class="close"
            data-dismiss="alert"
            aria-label="Close">
            <span aria-hidden="true">&times</span>
        </button>
	</div>
@endif