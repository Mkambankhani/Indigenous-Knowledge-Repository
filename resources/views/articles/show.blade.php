@extends('layouts.app')
@section('content')
<style type="text/css">
	article{
		text-align: justify;
		font-size: 20px !important;
	}
	article > img{
		float: left;
		margin-right: 1%;
		margin-bottom: 1%;

	}
</style>
<div class="container">
	<h2>{{$article->title}}</h2>
		<article>
			<img src="{{$article->image_url}}" class = "img-thumbnail">
			<?=$article->body?>
		</article>
</div>
@endsection