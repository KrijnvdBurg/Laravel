@extends('app')

@section('content')
	<h1>Articles</h1>
	<hr class="hr_doubleInfinite"/>

	@foreach ($articles as $article)
		<article class="article{{ $article->id }}">
			<h2><a href="{{ url('/articles', $article->id)}}">{{ $article->title }}</a></h2>
			<hr class="hr_dotted"/>
			<div class="articleBody">{{ $article->body }}</div>
		</article>
	@endforeach

@stop
