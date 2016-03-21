@extends('layouts.admin')
@section('content')
	<div class="row">
         <div class="col-lg-12">
              <h4 class="page-header">Indigenous Knowledge View Tasks</h4>
         </div>
    </div>
    <div class="row">
                <table class="table table-striped table-bordered table-hover" id="table">
                    <thead>
                        <tr>
                            <th>Tasks</th>
                            <th> Author</th>
                            <th>Editor</th>
                            <th>Visibility</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach($tasks as $task)
                            <tr>
                                <td>{{$task->article_id}}</td>
                                <td>{{$task->user_id}}</td>
                                <td>{{$task->user_id}}</td>
                                <td><a href=""><span class="fa fa-eye"></span></a></td>
                                 <td>&nbsp;<a href=""><span class="fa fa-ban"></span></a> &nbsp;  &nbsp;  &nbsp; <a href="/articles/{{$task->article_id}}/edit"><span class="fa fa-edit"></span></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
    </div>
@endsection