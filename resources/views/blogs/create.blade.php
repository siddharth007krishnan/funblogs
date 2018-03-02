@extends('layouts.app')

@section('content')
	
	<div class="container">
		<form action =" {{ action ('BlogsController@store') }}" method="POST">
			{{ csrf_field() }}
			<div class="form-group">
				<input type="text" name="title" class="form-control" placeholder="Blog Title ...." required>
			</div>
			<div class="form-group">
				<textarea name = "content" class="form-control" rows="8" cols="12" required></textarea>
			</div>
			<div class="form-group">
				<input type="submit" name="submit" value="submit" class="btn btn-primary">
			</div>
		</form>	
	</div>
	
@endsection