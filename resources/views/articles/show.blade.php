@extends('app')
@section('content')
	<article>
		<header><h1>Article - {{ $article->title }}</h1></header>
		<p class="articleBody">{{ $article->body }}</p>
		@unless ($article->tags->isEmpty())
			<ul>
				@foreach ($article->tags as $tag)
					<li class="article_tags"><a href="{{ url('/Tags', $tag->name)}}">{{ $tag->name }}</a></li>
				@endforeach
			</ul>
		@endunless
	</article>
@stop
