@extends('layouts.admin')
@section('content')
		<div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header">Indigenous Knowledge View Articles</h4>
                </div>
            </div>
            <div class="row">
                <table class="table table-striped table-bordered table-hover" id="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th> Author</th>
                            <th>Editor</th>
                            <th>Visibility</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach($articles as $article)
                    		<tr>
                    			<td>{{$article->title}}</td>
                    			<td>{{$article->author_id}}</td>
                    			<td>{{$article->editor_id}}</td>
                    			<td align="center"><a href=""><span class="fa fa-eye"></span></a></td>
                    			<td>&nbsp;<a href="/articles/{{$article->article_id}}/edit"><span class="fa fa-edit"></span></a> &nbsp;  &nbsp;  &nbsp; <a href=""><span class="fa fa-trash"></span></a></td>
                    		</tr>
                    	@endforeach
                    </tbody>
                </table>
            </div>
@endsection