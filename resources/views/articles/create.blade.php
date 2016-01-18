@extends('app')

@section('content')
	<h1>Write a new article</h1>

	<hr/>

	{!! Form::model($article = new \App\Article, ['url' => 'articles']) !!}
		@include('articles._form', ['submitButtonText' => 'Add Article']);
	{!! Form::close() !!}

	@if ($errors->any())
		<ul class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif

@stop
