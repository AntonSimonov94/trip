@extends('layouts.admin')
@section('news')
    <div class="container" style="width:1000px;margin: 0 auto;">
        <h1 class="display-3">Редактирование источника</h1>
    </div>
@endsection
@section('content')
    <form method="post" style='margin-left: 250px; margin-right: 250px', action="{{ route('admin.sources.update', ['source' => $sources]) }}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="title">Название</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $sources->title }}">
            @error('title') <strong style="color:red;">{{ $message }}</strong>  @enderror
        </div>
        <div class="form-group">
            <label for="author">Автор</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ $sources->author }}">
            @error('author') <strong style="color:red;">{{ $message }}</strong>  @enderror
        </div>
        <div class="form-group">
            <label for="country">Страна</label>
            <input type="text" class="form-control" id="country" name="country"  value="{{ $sources->country }}">
            @error('country') <strong style="color:red;">{{ $message }}</strong>  @enderror
        </div>
        <div class="form-group">
            <label for="year">Год издания</label>
            <input type="range" min="1970" max="2022" class="form-control" id="year" name="year"  value="{{ $sources->year }}">
            @error('year') <strong style="color:red;">{{ $message }}</strong>  @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-success" style="float:left;">Сохранить</button>
    </form>
@endsection

