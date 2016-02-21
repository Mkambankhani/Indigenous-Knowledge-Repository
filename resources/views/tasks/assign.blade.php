@extends('layouts.admin')
@section('content')
	<div class="row">
         <div class="col-lg-12 col-md-12">
                <h4 class="page-header">Indigenous Knowledge Assign Tasks</h4>
          </div>
     </div>
    <div class="row">
    	<form >
	    	 <div class="col-lg-6 col-md-6 panel">
	              <h5>Choose Category</h5>
	                 <select class="form-control" name="category" id="category">
	                    <option>History</option>
	                    <option>Practices</option>
	                  </select>
	               <h5>Tasks</h5>
	                 <div class="form-group form-horizontal">
	                        <label class="checkbox-inline">
	                        <input type="checkbox"> Task One
	                        </label>
	                        <br/>
	                        <label class="checkbox-inline">
	                            <input type="checkbox">Task Two
	                        </label>
	                        <br/>
	                        <label class="checkbox-inline">
	                            <input type="checkbox">Task Three
	                        </label>
	                 </div>
	        </div>
	        <div class="col-lg-6 col-md-6">
	                    <h5>Choose Editors To Assign</h5>
	                    <select class="form-control" name="editor" id="editor">
	                        <option>Owen Onions</option>
	                        <option>Erick Samikwa</option>
	                    </select>
	                    <br/>
	                    <button class="btn btn-success pull-right">Assign</button>
	        </div>
    	</form>
    </div>
@endsection