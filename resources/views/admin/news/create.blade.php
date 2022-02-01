@extends('layouts.main')
@section('news')
    <div class="container" style="width:1000px;margin: 0 auto;">
        <h1 class="display-3">Форма добавления новости</h1>
    </div>
@endsection
@section('content')
    <form method="post" style='margin-left: 250px; margin-right: 250px', action="{{ route('admin.news.store') }}">
        @csrf
        <div class="form-group">
            <label for="news">Выбрать категории</label>
            <select class="form-control" name="news[]" multiple="multiple" size="6" required>
                @foreach($catalogs as $catalog)
                    <option value="{{$catalog->id}}">{{$catalog->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="title">Автор</label>
            <input type="text" class="form-control" id="producer" name="producer" value="{{ old('producer') }}">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <input type="text" class="form-control" id="description" name="description"  value="{{ old('description') }}">
        </div>
        <div class="form-group">
            <label for="sources">Выбрать источники</label>
            <select class="form-control" name="sources[]" multiple="multiple" size="6" required>
                @foreach($sources as $source)
                    <option value="{{$source->id}}">{{$source->title}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-success" style="float:left;">Сохранить</button>
    </form>
@endsection
