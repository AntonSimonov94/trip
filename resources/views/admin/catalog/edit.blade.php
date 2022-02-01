@extends('layouts.main')
@section('news')
    <div class="container" style="width:1000px;margin: 0 auto;">
        <h1 class="display-3">Форма добавления категории</h1>
    </div>
@endsection
@section('content')

    <form method="post" style='margin-left: 250px; margin-right: 250px', action="{{ route('admin.catalog.update',['catalog' =>$catalogs]) }}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $catalogs->title }}">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <input type="text" class="form-control" id="description" name="description"  value="{{ $catalogs->description }}">
        </div>
        <br>
        <button type="submit" class="btn btn-success" style="float:left;">Сохранить</button>
    </form>
@endsection
