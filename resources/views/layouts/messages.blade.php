@if (session ('success'))
	<div class="alert alert-success">
		{{ session ('success') }}
	</div>
@endif

@if (session ('warning'))
	<div class="alert alert-danger">
		{{ session ('warning') }}
	</div>
@endif

@if ($errors->count() > 0) 
	@foreach ($errors->all() as $error)
		<div class="alert alert-danger">
			{{ $error }}
		</div>
	@endforeach
@endif