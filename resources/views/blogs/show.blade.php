@extends ('layouts.app')

@section ('content')
	<div class="container">
		<h1> 
			<div class = "text-primary">
				{{ $blog->title }} 
			</div>
		</h1>
		<p>
			<div class="bg-info">
				{{ $blog->content }}
			</div>
		</p>
		<div>
			<a href=" {{ url ("blogs") }} " class = "btn btn-primary">Back</a>
		</div>
		<br>
		<div>
			<a href=" {{ url ("blog/edit/$blog->id") }} " class = "btn btn-danger">EDIT</a>
		</div>
		<br>
		<br>
		<div>
			<form action =" {{ action('BlogsController@destroy' , ['id' => $blog->id]) }} " method="POST">
				@method('DELETE')
				{{ csrf_field() }}
				<div class="form-group">
					<input type="submit" name="submit" value="DELETE" class="btn btn-danger">
				</div>
			</form>
		</div>
		
	</div>
@endsection