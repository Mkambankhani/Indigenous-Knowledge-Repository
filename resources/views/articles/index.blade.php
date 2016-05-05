@extends('layouts.app')
@section('content')
<style type="text/css">
	.body{
		text-align: justify;
		font-size: 20px !important;
		width: 100%;
	}
	.body > img{
		margin-right: 1%;
		margin-bottom: 1%;
		width: 15%;
		height: 15%;
		float: left;

	}
	<?php
		 function cutString($text){
		 	$result ="";
		 	
		 }

	?>
</style>
	<div class="container">
		<h1>Articles</h1>
		@foreach($articles as $article)
			<div class="row col-lg-12 -col-md-12">
				<h3><a href="/articles/{{$article->article_id}}">{{$article->title}}</a></h3>
				<div class="body">
						<img src="{{$article->image_url}}" class = "img-thumbnail">
						<?= $article->body ?>
				</div>
			</div>
		@endforeach
	</div>
@endsection