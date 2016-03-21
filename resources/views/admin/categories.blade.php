@extends('layouts.admin')
@section('content')
			<div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header">Indigenous Knowledge View Categories</h4>
                </div>
            </div>
            <div class="row">
                <table class="table table-striped table-bordered table-hover" id="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Visibility</th>
                            <th>Date Created</th>
                            <th>Date Upadated</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach($categories as $category)
                    		<tr>
                    			<td>{{$category->cat_name}}</td>
                    			<td align="center"><a href=""><span class="fa fa-eye"></span></a></td>
                    			<td>{{$category->created_at}}</td>
                    			<td>{{$category->updated_at}}</td>
                    			<td>&nbsp;<a href="/categories/{{$category->cat_id}}/edit"><span class="fa fa-edit"></span></a> &nbsp;  &nbsp;  &nbsp; <a href=""><span class="fa fa-trash"></span></a></td>
                    		</tr>
                    	@endforeach
                    </tbody>
                </table>
            </div>
@endsection