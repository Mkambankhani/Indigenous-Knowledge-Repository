@extends('layouts.admin')
@section('content')
	<h1>Articles</h1>
	@foreach($articles as $article)
		<article>
			<h3><a href="/articles/{{$article->article_id}}">{{$article->title}}</a></h3>
			<div class="body">
					<?= $article->body ?>
			</div>
		</article>
	@endforeach
@endsection