@extends('layouts.admin')
@section('content')
	<div class="row">
        <div class="col-lg-12">
                    <h4 class="page-header">Indigenous Knowledge Add Category</h4>
         </div>
     </div>
     <div class="row">
                <form id="categoryForm" method="POST" action="/categories/new">
                   <div class="form-group">
                        <label>Category Name</label>
                        <div class="input-group">
                            <input class="form-control" placeholder="Enter text" name="category_name" id="category_name">
                            <a class="btn input-group-addon " onclick="" ><span class="fa fa-close"></span></a>
                        </div>
                    </div>
                   <div class="form-group">
                        <label>Text area</label>
                        <textarea class="form-control" rows="3" name="category_description" id="category_description"></textarea>
                    </div>
                    <div class="form-group"><button type="submit" class="btn btn-success">Add</button><a class="btn btn-warning pull-right" onclick="reset()">Reset</a></div>
                </form>
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