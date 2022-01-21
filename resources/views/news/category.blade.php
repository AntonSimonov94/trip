@extends('layouts.main')
@section('news')
    <div class="container">
        <h1 class="display-3">Актуальные новости про {{$name}}</h1>
        <p>Краткое описание.</p>
    </div>
@endsection

@section('content')

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <?php $n=0; ?>
            @foreach ($catalog as $category => $products)
                @if ($name == $category)
                        <?php $n=1; ?>
                    @foreach ($products as $product => $des)
                <div class="col-md-4">
                    <h2><a href="{{route('news.news', ['name' => $category, 'des' => $product])}}">{{$product}}</a></h2>
                    <p>Новости про {{$product}}. </p>
                    <p><a class="btn btn-secondary" href="{{route('news.news', ['name' => $category, 'des' => $product])}}" role="button">Подробнее &raquo;</a></p>
                </div>
                    @endforeach

                @endif

            @endforeach
            @if ($n==0)
                    <div class="col-md-4">
                        <h2>Такой новости не существует</h2>
                    </div>
                @endif
        </div>

        <hr>

    </div> <!-- /container -->
@endsection
