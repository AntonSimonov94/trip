<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Актуальные новости техники</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/jumbotron.css')}}jumbotron.css" rel="stylesheet">
</head>

<body>

<x-header></x-header>

<main role="main">

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        @yield('news')
    </div>
@yield('content')


</main>

<x-footer></x-footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{asset('js/jquery-3.2.1.slim.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>
