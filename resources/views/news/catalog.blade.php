@extends('layouts.main')
@section('news')
    @if($newsList == [])
    <div class="container">
        <h1 class="display-3">Актуальные новости про</h1>
        <p>Краткое описание.</p>
    </div>
    @else <h1>Нет новостей</h1>
    @endif
@endsection

@section('content')

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            @if($newsList !== [])
                @foreach ($newsList as $news)
                        <div class="col-md-4">
                            <h2>
                                <a href="{{route('news.news', ['catalog' => $catalog, 'news' => $news])}}">{{$news->title}}</a>
                            </h2>
                            <p>Новости про {{$news->title}}. </p>
                            <p><a class="btn btn-secondary"
                                  href="{{route('news.news', ['catalog' => $catalog, 'news' => $news])}}" role="button">Подробнее
                                    &raquo;</a></p>
                        </div>

                @endforeach
                @endif
        </div>

        <hr>

    </div> <!-- /container -->
@endsection
