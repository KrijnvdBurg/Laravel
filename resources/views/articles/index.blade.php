@extends('app')

@section('content')
	<h1>Articles</h1>
	<hr class="hr_doubleInfinite"/>

	@foreach ($articles as $article)
		<article class="post_article article{{ $article->id }}">
			<header>
				<h2 class="post_h2"><a href="{{ url('/articles', $article->id)}}">{{ $article->title }}</a></h2>
			</header>
			<hr class="hr_dotted"/>
			<p class="post_body">{{ $article->body }}</p>
		</article>
	@endforeach



@stop
