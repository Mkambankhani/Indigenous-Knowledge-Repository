@extends('layouts.admin')
@section('content')
	<div class="row">
        <div class="col-lg-12">
                    <h4 class="page-header">Indigenous Knowledge Add Article</h4>
         </div>
     </div>
     <div class="row">
                 @if(isset($success))
                    <div class="alert alert-success"> {{$success}} </div>
                @endif
        {!! Form::open(['action'=>'ArticlesController@store', 'files'=>true]) !!}
                    <div class="form-group">
                            <label>Choose Category</label>
                            <select class="form-control" name="category">
                                @foreach($categories as $category)
                                    <option value="{{$category->cat_id}}">{{$category->cat_name}}</option>
                                @endforeach
                            </select>
                    </div>
                   <div class="form-group">
                        <label>Article Title</label>
                        <div class="input-group">
                            <input class="form-control" placeholder="Enter text" name="title" id="title">
                            <a class="btn input-group-addon " onclick="" ><span class="fa fa-close"></span></a>
                        </div>
                    </div>
                   <div class="form-group">
                        <label>Body</label>
                        <textarea class="form-control" rows="3" name="body" id="body"></textarea>
                    </div>
                    <div class="form-group">
                            <label>Choose Editor</label>
                            <select class="form-control" name="editor">
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->email}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-3">
                            {!! Form::label('doc', 'Upload Document') !!}
                            {!! Form::file('doc') !!}
                        </div>
                         <div class="form-group col-lg-3">
                            {!! Form::label('image', 'Upload Image') !!}
                            {!! Form::file('image') !!}
                        </div>
                        <!--div class="form-group col-lg-3">
                            {!! Form::label('video', 'Upload Video') !!}
                            {!! Form::file('video') !!}
                        </div-->

                    </div>
                    
                    <div class="form-group"><button type="submit" class="btn btn-success">Add</button><a onclick="reset()" class="btn btn-warning pull-right">Reset</a></div>
                {!! Form::close() !!}
                
            </div>
<script type="text/javascript">
    var form = document.getElementById("articleForm"); 
    var request = XMLHttpRequest();
    form.addEventListener('submit', function(e){
        e.preventDefault();
        var formdata = new FormData(form);
        request.open("post", '/articles/new');
        request.addEventListener("load",transferComplete);
        request.send(formdata);
    });
    function transferComplete(data){
        console.log(data.currentTarget.response);
    }
	function reset(){

	}
	/*$("categoryForm").submit(function (e){

         if(isBlank("name") && isBlank("body")){

         }
         else{
            hidePanel();
            e.preventDefault();

          }
      });*/
	function isBlank(inputName){
		if($("#inputName").val().length = 0){
			return false;
		}
		else{
			return true;
		}
	}

</script>	
@endsection