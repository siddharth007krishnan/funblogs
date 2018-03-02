@extends ('layouts.app')

@section ('content')
	<div class="container">
		@if ($blogs->count() === 0)
			<div class="bg-info">
				No posts to show
			</div>
		@else
			<div class="well well-lg">
				<ul class="list-group">
					@foreach ($blogs as $blog)
						<li class="list-group-item">
							<a href=" {{ url ("blog/$blog->id") }} "> {{ $blog->title }}</a>
						</li>
					@endforeach
				</ul>
			</div>
		@endif
		<hr>
		<div>
			<a href=" {{ url ("blog") }} " class="btn btn-primary">Create</a>
		</div>
	</div>
@endsection