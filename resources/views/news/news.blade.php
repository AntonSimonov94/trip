@extends('layouts.main')

@section('news')

    <div class="container">
        <h1 class="display-3">{{$news->title}}</h1>
                        <p>{{ $news->description }}</p>
    </div>

@endsection

