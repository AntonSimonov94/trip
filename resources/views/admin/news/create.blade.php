@extends('layouts.admin')
@section('news')
    <div class="container" style="width:1000px;margin: 0 auto;">
        <h1 class="display-3">Форма добавления новости</h1>
    </div>
@endsection
@section('content')
    <form method="post" style='margin-left: 250px; margin-right: 250px', action="{{ route('admin.news.store') }}">
        @csrf
        <div class="form-group">
            <label for="catalogs">Выбрать категории</label>
            <select class="form-control" name="catalogs[]" multiple="multiple" size="6">
                @foreach($catalogs as $catalog)
                    <option value="{{$catalog->id}}">{{$catalog->title}}</option>
                @endforeach
            </select>
            @error('catalogs') <strong style="color:red;">{{ $message }}</strong>  @enderror
        </div>
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            @error('title') <strong style="color:red;">{{ $message }}</strong>  @enderror
        </div>
        <div class="form-group">
            <label for="title">Автор</label>
            <input type="text" class="form-control" id="producer" name="producer" value="{{ old('producer') }}">
            @error('producer') <strong style="color:red;">{{ $message }}</strong>  @enderror
        </div>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <input type="text" class="form-control" id="description" name="description"  value="{{ old('description') }}">
            @error('description') <strong style="color:red;">{{ $message }}</strong>  @enderror
        </div>
        <div class="form-group">
            <label for="sources">Выбрать источники</label>
            <select class="form-control" name="sources[]" multiple="multiple" size="6">
                @foreach($sources as $source)
                    <option value="{{$source->id}}">{{$source->title}}</option>
                @endforeach
            </select>
            @error('sources') <strong style="color:red;">{{ $message }}</strong>  @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-success" style="float:left;">Сохранить</button>
    </form>
@endsection
