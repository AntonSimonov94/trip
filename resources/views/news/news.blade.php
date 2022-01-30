@extends('layouts.main')

@section('news')
    @foreach($des as $news => $main)
    <div class="container">
        <h1 class="display-3">{{$main->title}}</h1>
                        <p>{{ $main->description }}</p>
    </div>
    @endforeach
@endsection

