@extends('layouts.main')

@section('news')
<div class="container">
    <h1 class="display-3">Актуальные новости по категориям</h1>
    <p>Краткое описание.</p>
</div>
@endsection

@section('content')

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            @forelse ($catalog as $category => $des)
            <div class="col-md-4">
                <h2><a href="{{route('news.category', ['name' => $category]) }}">{{ $category }}</a></h2>
                <p>Новости про {{$category}}. </p>
                <p><a class="btn btn-secondary" href="{{route('news.category', ['name' => $category]) }}" role="button">Подробнее &raquo;</a></p>
            </div>
            @empty
                <h2>Записей нет</h2>
            @endforelse
        </div>

        <hr>

    </div> <!-- /container -->
@endsection


