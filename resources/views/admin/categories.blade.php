@extends('layouts.admin')
@section('content')
            <script type="text/javascript">
                     function actionModal(id,url,modal_title){
                        ajaxgetArticle(id);
                        $("#modal_category").html(modal_title);
                        $("#action").on('click', function(){
                            window.location = url;
                        });
                        $("#myModal").modal();
                    }
                    function ajaxgetArticle(id){
                        $.ajax({
                          url: '/categories/find?id='+id,
                          success: function(result) {
                              var data= result;
                              var div = document.createElement("div");
                              div.id = "article";
                              var title = document.createElement("h4");
                              title.innerHTML = result.cat_name + result.cat_description;
                              div.appendChild(title);

                              $("#modal-body").empty();
                              $("#modal-body").append(div);
                              console.log(result);
                          }
                        });
                    }
            </script>
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
                    			<td align="center">
                                        <a onclick="actionModal({{$category->cat_id}},'/categories/{{$category->cat_id}}/visible','publish')">
                                             @if ($category->cat_visibility == 1 ) 
                                                <span class="fa fa-eye"></span>
                                             @else
                                                <span class="fa fa-eye-slash" style="color:orange"></span>
                                             @endif
                                         </a>
                                </td>
                    			<td>{{$category->created_at}}</td>
                    			<td>{{$category->updated_at}}</td>
                    			<td>&nbsp;<a href="/categories/{{$category->cat_id}}/edit"><span class="fa fa-edit"></span></a> &nbsp;  &nbsp;  &nbsp; <a onclick="actionModal({{$category->cat_id}},'/categories/{{$category->cat_id}}/delete','delete')"><span class="fa fa-trash"></span></a></td>
                    		</tr>
                    	@endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Are you Sure you want to <font id="modal_category"></font>?</h4>
                                        </div>
                                        <div class="modal-body" id="modal-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" id="action">Finish</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
            </div>
@endsection