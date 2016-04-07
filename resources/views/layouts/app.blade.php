
<!--


I K    R E P O S I T O R Y   T E M P L A T E

a u t h o r e d   b y   R h i n o T e c h

F e b r u a r y   2 0 1 6


-->
<!DOCTYPE html5>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!--TITLE TO BE DEFINED IN A VAR $TITLE-->
    <title>IK Repository</title>
    <!--EO TITLE-->

    <!--OTHER METADATA-->
    <!--EO OTHER METADATA-->

    <!--Google Analytics-->
    <!--EO Google Analytics-->

    <!-- Bootstrap Core CSS -->
    <link href="/libraries/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/sb-admin-2.css" rel="stylesheet">
    <link href="css/rhino-twerks.css" rel="stylesheet">

    <!-- Font Awesome. Make sure that it is the latest version -->
    <link href="/libraries/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <script>
        $('.dropdown-toggle').dropdown();
    </script>
    <style type="text/css">
            .navbar-brand{
                font-style: normal;
            }
    </style>

</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Indigenous Knowledge
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}"></a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown" role="presentation">
                            <a class="dropdown-toggle" data-toggle="dropdown"  role="button" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->username }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer style="color: #9d9d9d">
        <div class="container">
            <div class="col-lg-12">
                <p>Copyright &copy; I.K. Repository 2016</p>
            <span class="pull-right" style="margin-top: -3%">
                <small>
                    <a href="">Admin</a> &middot;
                    <a href="">Terms</a> &middot;
                    <a href="">About</a><b> &middot;</b>
                    <span style="background:"><b>Developed by</b>
                        <a href="" target="_blank"><b>RhinoTech</b></a></span>
                </small>
            </span>
            </div>
        </div>
    </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="/libraries/jquery/dist/js/jquery.js" type="text/javascript" ></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/libraries/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

</body>

</html>

