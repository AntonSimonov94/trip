@extends('layouts.main')
@section('news')
    <div class="container">
        <h1 class="display-3">Актуальные новости про</h1>
        <p>Краткое описание.</p>
    </div>
@endsection

@section('content')

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
                @foreach ($newsList->catalogs as $news)
                        <div class="col-md-4">
                            <h2>
                                <a href="{{route('news.news', ['catalog' => $newsList, 'news' => $news])}}">{{$news->title}}</a>
                            </h2>
                            <p>Новости про {{$news->title}}. </p>
                            <p><a class="btn btn-secondary"
                                  href="{{route('news.news', ['catalog' => $newsList, 'news' => $news])}}" role="button">Подробнее
                                    &raquo;</a></p>
                        </div>
                @endforeach
        </div>

        <hr>

    </div> <!-- /container -->
@endsection
