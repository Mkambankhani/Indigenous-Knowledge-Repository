@extends('layouts.admin')
@section('content')
	<div class="row">
        <div class="col-lg-12">
                    <h4 class="page-header">Indigenous Knowledge Add Category</h4>
         </div>
     </div>
     <div class="row">
     {!! Form::model($category, array('url' => 'categories/'.$category->cat_id.'/update')) !!}
                <!--form id="categoryForm" method="POST" action="/categories/new"-->
                   <div class="form-group">
                        <label>Category Name</label>
                        <div class="input-group">
                            {{Form::text('cat_name', null, ['class' =>'form-control', 'id' => 'cat_name'])}}
                            <a class="btn input-group-addon " onclick="" ><span class="fa fa-close"></span></a>
                        </div>
                    </div>
                   <div class="form-group">
                        <label>Text area</label>
                        {{Form::textarea('cat_description', null, ['class' =>'form-control', 'id' => 'cat_description'])}}
                    </div>
                    <div class="form-group"><button type="submit" class="btn btn-success">Add</button><a class="btn btn-warning pull-right" onclick="reset()">Reset</a></div>
       {!! Form::close() !!}
      </div>
<script type="text/javascript">
	function reset(){
		$("#category_name").val("");
		$("#category_description").val("");
	}
	$("categoryForm").submit(function (e){

         if(isBlank("category_name") && isBlank("category_description")){

         }
         else{
            hidePanel();
            e.preventDefault();

          }
      });
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