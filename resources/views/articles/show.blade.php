@extends('layouts.admin')
@section('content')
	<h2>{{$article->title}}</h2>
		<article>
					{{$article->body}}
		</article>
@endsection