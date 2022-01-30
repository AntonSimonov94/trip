@extends('layouts.main')

@section('news')
    <div class="container">
        <h1 class="display-3">Актуальные новости по категориям</h1>
        <p>Краткое описание.</p>
<x-form></x-form>

    </div>
@endsection

@section('content')

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            @forelse ($catalog as $category)
                <div class="col-md-4">
                    <h2><a href="{{route('news.category', ['name' => $category->id]) }}">{{ $category->title }}</a></h2>
                    <p>Новости про {{$category->title}}. </p>
                    <p><a class="btn btn-secondary" href="{{route('news.category', ['name' => $category->id]) }}"
                          role="button">Подробнее &raquo;</a></p>
                </div>
            @empty
                <h2>Записей нет</h2>
            @endforelse
        </div>

        <hr>

    </div> <!-- /container -->
@endsection


