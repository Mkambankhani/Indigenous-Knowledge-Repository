@extends('layouts.admin')
@section('content')
	<h1>Categories</h1>
	@foreach($categories as $category)
		<article>
			<h3>{{$category->cat_name}}</h3>
			<div class="body">
					{{$category->cat_description}}
			</div>
		</article>
	@endforeach
@endsection