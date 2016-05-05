@extends('layouts.app')

@section('content')
        <!-- Page Content -->
<div class="container">


    <div class="row margin-top-10">
        <div class="col-lg-12">

            <!-- INTRO TEXT TO BE DEFINED UNDER VAR $INTRO_TEXT -->
            <h2 class="intro-text col-md-offset-4">
                OVER <span style="color: #df2d2d">300+</span> ENTRIES!
            </h2><br /><br />
            <!-- EO INTRO TEXT -->

        </div><!-- /.col-lg-12 -->


        <div class="col-lg-12">
            <form action="/articles/search" method="post">

                <div class="input-group input-group-lg col-lg-offset-2 col-lg-8 col-lg-offset-2">

                                   <span class="input-group-addon" id="basic-addon1">
                                       <i class="fa fa-pencil-square-o"></i>
                                   </span>

                    <input type="text" name="key_words" class="form-control" placeholder="Find what you are looking for ..." aria-describedby="basic-addon1" name="main_search">

                </div><br />


                <div class="input-group input-group-lg col-lg-offset-3 col-lg-6 col-lg-offset-3">
                    <input type="submit" class="btn btn-danger btn-lg col-lg-offset-3 col-lg-6 col-lg-offset-3" value="Search" name="submit" />
                </div>
            </form>
        </div><!-- /form -->


    </div><br /><br /><br /><br /><br />
    <!-- /.row -->

    <hr />

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-4" id="recent_entry">

            <p><b>Recent Entries</b></p>
            @foreach($recent as $item)
               <p class="slik"><a href="/articles/{{$item->article_id}}"><small>{{$item->title}}</small></a> </p>
            @endforeach
            <br />

            <a class="btn btn-default" href="/articles?order=recent">More Entries</a>
        </div>
        <!-- /.col-md-4 -->
        <div class="col-md-4" id="most_viewed">

            <p><b>Most Viewed</b></p>
            @foreach($most_visit as $item)
               <p class="slik"><a href="/articles/{{$item->article_id}}"><small>{{$item->title}}</small>(<span>{{$item->aggregate}}</span>)</a> </p>
            @endforeach
            <br />
            <a class="btn btn-default" href="/articles?order=most_visited">More Entries</a>
        </div>
        <!-- /.col-md-4 -->
        <div class="col-md-4">

            <p style="text-align: center"><b>Featured Authors</b></p>
            <p class="slik col-lg-12" style="margin-bottom: 5%; font-size: small">
                   <span class="slik col-lg-3">

                       <img src="admin/roy.jpg" class="img-responsive img-circle" height="280" width="200" />

                   </span>

                   <span class="slik col-lg-3">


                       <img src="admin/20150417_104759.jpg" class="img-responsive img-circle" height="280" width="200" />

                   </span>

                   <span class="slik col-lg-3">


                       <img src="admin/CIMG1797.jpg" class="img-responsive img-circle" height="280" width="200" />

                   </span>


                   <span class="slik col-lg-3">


                       <img src="admin/IMG_0200.jpg" class="img-responsive img-circle" height="280" width="200" />

                   </span>
            </p>

            <p class="col-lg-12" style="background: white; padding: 3%">Above will be images of some of the authors</p>

        </div>
        <!-- /.col-md-4 -->
    </div>
    <!-- /.row -->

    <hr />
    <script type="text/javascript">

    </script>
@endsection
