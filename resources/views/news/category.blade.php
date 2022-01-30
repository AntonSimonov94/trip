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
            @foreach ($name as $products => $product)
                @foreach ($product as $prod => $pr)
                        <div class="col-md-4">
                            <h2>
                                <a href="{{route('news.news', ['name' => $id,'id' => $pr->id])}}">{{$pr->title}}</a>
                            </h2>
                            <p>Новости про {{$pr->title}}. </p>
                            <p><a class="btn btn-secondary"
                                  href="{{route('news.news', ['name' => $id, 'id' => $pr->id])}}" role="button">Подробнее
                                    &raquo;</a></p>
                        </div>
                @endforeach
            @endforeach
        </div>

        <hr>

    </div> <!-- /container -->
@endsection
