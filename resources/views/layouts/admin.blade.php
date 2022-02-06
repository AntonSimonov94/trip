<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Актуальные новости техники</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/jumbotron.css')}}jumbotron.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div>
    <a class="navbar-brand "  href="{{route('news.start')}}">User</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    </div>
    <div  id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link " @if(request()->routeIs('admin.catalog.index')) style="color: green" @endif href="{{route('admin.catalog.index')}}">Каталог<span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
    <div  id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" @if(request()->routeIs('admin.news.index')) style="color: green" @endif href="{{route('admin.news.index')}}">Новости<span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
    <div>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" @if(request()->routeIs('admin.sources.index')) style="color: green" @endif href="{{route('admin.sources.index')}}">Источники<span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
    <div style="position:absolute; right: 0px; margin-right: 30px;" >
        <form class="form-inline my-2 my-lg-0">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Добавить пользователя</button>
        </form>
    </div>
</nav>

<main role="main" >

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" >
        <x-form></x-form>
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
@stack('js')
</body>
</html>

