@extends('app')

@section('content')
	<h1>Articles</h1>
	<hr class="hr_doubleInfinite"/>

	@foreach ($articles as $article)
			<article id="article{{ $article->id }}" class="post_article {{App\Article::date_locker($article->published_at)}}">
				<header>
					<h2 class="post_h2">{!! App\Article::ahref_locker($article) !!}</h2>
				</header>
				<hr class="hr_dotted"/>
				<p class="post_body">{{ $article->excerpt }}</p>
			</article>

	@endforeach



@stop
