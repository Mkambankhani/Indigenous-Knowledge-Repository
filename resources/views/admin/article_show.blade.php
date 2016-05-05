@extends('layouts.admin')
@section('content')
<style type="text/css">
	article{
		text-align: justify;
		font-size: 20px !important;
	}
	article > img{
		float: left;
		margin-right: 1%;
		margin-bottom: 1%;
		width: 20%;
		height: 20%;

	}
</style>
<script type="text/javascript">
	function publish(){
		window.location = '/articles/{{$article->article_id}}/visible';
	}
</script>
<div class="container">
	<h2>{{$article->title}}</h2>
		<article>
			<img src="{{$article->image_url}}" class = "img-thumbnail">
			<?=$article->body?>
		</article>
</div>
<div class="container"><button onclick="window.location='/articles/{{$article->article_id}}/edit'" class="btn btn-success" >Edit</button><button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal" >Publish</button></div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Are you Sure you want to Publish?</h4>
                </div>
                <div class="modal-body" id="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left"  data-dismiss="modal">Close</button>
                     <button type="button" class="btn btn-primary" id="action" onclick="publish()">Finish</button>
                </div>
            </div>
                                    <!-- /.modal-content -->
      </div>
                                <!-- /.modal-dialog -->
 </div>
@endsection