@extends('layouts.admin')
@section('news')
    <div class="container" style="width:1000px;margin: 0 auto;">
        <h1 class="display-2">Форма редактирования категории</h1>
    </div>
@endsection
@section('content')
    @include('inc.message')
    <form method="post" style='margin-left: 250px; margin-right: 250px', action="{{ route('admin.catalog.update',['catalog' =>$catalogs]) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $catalogs->title }}">
            @error('title') <strong style="color:red;">{{ $message }}</strong>  @enderror
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description">{!! $catalogs->description !!}</textarea>
            @error('description') <strong style="color:red;">{{ $message }}</strong>  @enderror
        </div>
        <br>
        <div class="form-group">
            <label for="image">Загрузить изображение</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <br>
        <button type="submit" class="btn btn-success" style="float:left;">Сохранить</button>
    </form>
@endsection

@push('js')
    <script>
        ClassicEditor
            .create( document.querySelector(  '#description' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

@endpush
