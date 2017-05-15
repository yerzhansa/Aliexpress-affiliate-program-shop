<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $title or '' }}</title>
    <meta charset="utf-8">
    <meta name="description" itemprop="description" content="{{$desc or ''}}">
    <meta name="keywords" itemprop="keywords" content="{{$keywords or ''}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>--}}
    <script src="{{ URL::asset('js/jquery.js') }}"></script>
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/main.js') }}"></script>
    <script src="{{ URL::asset('js/index.js') }}"></script>
    <style>
        /* Remove the navbar's default rounded borders and increase the bottom margin */
        /*.navbar {*/
            /*margin-bottom: 50px;*/
            /*border-radius: 0;*/
        /*}*/

        /* Remove the jumbotron's default bottom margin */
        .jumbotron {
            margin-bottom: 0;
        }

        /* Add a gray background color and some padding to the footer */
        footer {
            background-color: #f2f2f2;
            padding: 25px;
        }
    </style>
</head>
<body>
<div class="header-fx">
{{--<div class="jumbotron">--}}
<div class="container text-center header-height">
    <h1>Online Store</h1>
    {{--<p>Mission, Vission & Values</p>--}}
</div>
{{--</div>--}}

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Logo</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Deals</a></li>
                <li><a href="#">Stores</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
            </ul>
        </div>
    </div>
</nav>
</div>
@yield('content')

{{--<div class="container">--}}
{{--<div class="row">--}}
{{--<div class="col-sm-4">--}}
{{--<div class="panel panel-primary">--}}
{{--<div class="panel-heading">BLACK FRIDAY DEAL</div>--}}
{{--<div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>--}}
{{--<div class="panel-footer">Buy 50 mobiles and get a gift card</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="col-sm-4">--}}
{{--<div class="panel panel-primary">--}}
{{--<div class="panel-heading">BLACK FRIDAY DEAL</div>--}}
{{--<div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>--}}
{{--<div class="panel-footer">Buy 50 mobiles and get a gift card</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="col-sm-4">--}}
{{--<div class="panel panel-primary">--}}
{{--<div class="panel-heading">BLACK FRIDAY DEAL</div>--}}
{{--<div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>--}}
{{--<div class="panel-footer">Buy 50 mobiles and get a gift card</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
<br><br>

<footer class="container-fluid text-center">
    <p>Online Store Copyright</p>
    <form class="form-inline">Get deals:
        <input type="email" class="form-control" size="50" placeholder="Email Address">
        <button type="button" class="btn btn-danger">Sign Up</button>
    </form>
</footer>

</body>
</html>
