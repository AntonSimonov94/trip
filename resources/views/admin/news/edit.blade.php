@extends('layouts.admin')
@section('news')
    <div class="container" style="width:1000px;margin: 0 auto;">
        <h1 class="display-3">Редактировать новость</h1>
    </div>
@endsection
@section('content')
    @include('inc.message')
    <form method="post" style='margin-left: 250px; margin-right: 250px', action="{{ route('admin.news.update',['news' => $news]) }}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="catalogs">Выбрать категории</label>
            <select class="form-control" name="catalogs[]" multiple="multiple" size="6">
                @foreach($catalogs as $catalog)
                    <option value="{{$catalog->id}}" @if(in_array($catalog->id, $selectCatalogs)) selected @endif>
                        {{$catalog->title}}
                    </option>

                @endforeach
            </select>
            @error('catalogs') <strong style="color:red;">{{ $message }}</strong>  @enderror
        </div>
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}">
            @error('title') <strong style="color:red;">{{ $message }}</strong>  @enderror
        </div>
        <div class="form-group">
            <label for="producer">Автор</label>
            <input type="text" class="form-control" id="producer" name="producer" value="{{ $news->producer }}">
            @error('producer') <strong style="color:red;">{{ $message }}</strong>  @enderror
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <input type="text" class="form-control" id="description" name="description"  value="{{ $news->description }}">
            @error('description') <strong style="color:red;">{{ $message }}</strong>  @enderror
        </div>
        <div class="form-group">
            <label for="sources">Выбрать источники</label>
            <select class="form-control" name="sources[]" multiple="multiple" size="6" required>
                @foreach($sources as $source)
                    <option value="{{$source->id}}" @if(in_array($source->id, $selectSources)) selected @endif>
                        {{$source->title}}
                    </option>
                @endforeach
            </select>
            @error('sources') <strong style="color:red;">{{ $message }}</strong>  @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-success" style="float:left;">Сохранить</button>
    </form>
@endsection

