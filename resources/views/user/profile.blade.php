@extends('layouts.app')

<style type="text/css">
	.profile-img {
		max-width: 150px;
		border: 4px solid #fff;
		border-radius: 100%;
		box-shadow: 0 2px 2px rgba(0,0,0,0.3);
	}
</style>

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-body text-center">
					<img class="profile-img" src="/uploads/avatars/{{ $user->avatar }}">
					@if($user == Auth::user())
						<form class="form-inline" action="/profile" method="POST" enctype="multipart/form-data">
							{{ csrf_field() }}
							<input style="border: none; margin-top: 10px" class="form-control" type="file" name="avatar">
							<button class="btn" type="submit">submit</button>
						</form>
					@endif
					<h1>{{ $user->name }}</h1>
					<h5> {{ $user->email }} </h5>
					<h5> {{ $user->dob->format('l j F Y') }} ({{ $user->dob->age }} years old) </h5>
					@if($user->id != Auth::id())
						<follow :target="{{ $user->id }}"></follow>
					@endif
				</div>
			</div>
		</div>

		<hr class="col-md-8 col-md-offset-2">

		@foreach($user->articles->take(5) as $article)
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						{{ $article->owner }}
						<span class="pull-right">
							{{ $article->created_at->diffForHumans() }}
						</span>
					</div>
					<div class="panel-body">
						{{ $article->shortContent }} ...
						<a href="/articles/{{ $article->id }}">Read more</a>
					</div>
				</div>
			</div>
		@endforeach
	</div>
@endsection