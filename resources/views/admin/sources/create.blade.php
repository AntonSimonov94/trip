@extends('layouts.main')
@section('news')
    <div class="container" style="width:1000px;margin: 0 auto;">
        <h1 class="display-3">Форма добавления новости</h1>
    </div>
@endsection
@section('content')
    <form method="post" style='margin-left: 250px; margin-right: 250px', action="{{ route('admin.sources.store') }}">
        @csrf
        <div class="form-group">
            <label for="title">Название</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="author">Автор</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ old('author') }}">
        </div>
        <div class="form-group">
            <label for="country">Страна</label>
            <input type="text" class="form-control" id="country" name="country"  value="{{ old('country') }}">
        </div>
        <div class="form-group">
            <label for="year">Год издания</label>
            <input type="range" min="1970" max="2022" class="form-control" id="year" name="year"  value="{{ old('year') }}">
        </div>
        <br>
        <button type="submit" class="btn btn-success" style="float:left;">Сохранить</button>
    </form>
@endsection
