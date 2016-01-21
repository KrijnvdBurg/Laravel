@extends('app')
@section('content')
	<main class="container_articlesIndex">
		@foreach ($articles as $article)
			<article id="article{{ $article->id }}" class="post_article {{App\Article::date_locker($article->published_at)}}">
				<header>
					{!! App\Article::ahref_locker($article) !!}
				</header>
				<hr class="hr_dotted"/>
				<p class="post_body">{{ $article->excerpt }}</p>
				
			</article>
			
			<div class="article_notifs">
				{!! App\Article::warning_locker($article) !!}
				<ul class="article_tagsBar">
					@foreach ($article->tags as $tag)
						<li class="article_tags"><a href="{{ url('/Tags', $tag->name)}}">{{ $tag->name }}</a></li>
					@endforeach
				</ul>
			</div>
		@endforeach
	</main>
@stop
