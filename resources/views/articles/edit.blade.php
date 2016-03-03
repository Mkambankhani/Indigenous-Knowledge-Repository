@extends('layouts.admin')
@section('content')
	<div class="row">
        <div class="col-lg-12">
                    <h4 class="page-header">Indigenous Knowledge Edit {{$article->title}}</h4>
         </div>
     </div>
     <div class="row">
     	{!! Form::model($article, array('url' => 'articles/'.$article->article_id.'/update')) !!}
     		<div class="form-group">
                   {{Form::label('category', 'Choose Category')}}
                   <select class="form-control" name="category">
                         @foreach($categories as $category)
                            <option value="{{$category->cat_id}}">{{$category->cat_name}}</option>
                         @endforeach
                    </select>
             </div>
             <div class="form-group">
             		{{Form::label('title', 'Article Title')}}
                    <div class="input-group">
                           {{Form::text('title', null, ['class' =>'form-control', 'id' => 'title'])}}
                          <a class="btn input-group-addon " onclick="" ><span class="fa fa-close"></span></a>
                    </div>
            </div>
            <div class="form-group">
                         {{Form::label('body', 'Body')}}
                         {{Form::textarea('body', null, ['class' =>'form-control','id' =>'body', 'rows'=>'3'])}}
            </div>
            <div class="form-group">
                    {{Form::label('editor', 'Choose Editor')}}
                            <select class="form-control" name="editor">
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->email}}</option>
                                @endforeach
                            </select>
            </div>
            <div class="row">
                        <div class="form-group col-lg-3">
                            <label>Upload Doc</label>
                            <input type="file" name="document">
                        </div>
                         <div class="form-group col-lg-3">
                            <label>Upload Image</label>
                            <input type="file" name="image">
                        </div>
                        <div class="form-group col-lg-3">
                            <label>Upload Video</label>
                            <input type="file" name="video">
                        </div>

                    </div>
                    
                    <div class="form-group"><button type="submit" class="btn btn-success">Add</button><a onclick="reset()" class="btn btn-warning pull-right">Reset</a></div>
               
		{!! Form::close() !!}
     </div>
@endsection