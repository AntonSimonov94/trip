@extends('layouts.main')
@section('news')
    <div class="container" style="width:1000px;margin: 0 auto;">
        <h1 class="display-3">Форма обратной связи</h1>
    </div>
@endsection

@section('content')

    <form method="post" style="width:500px;margin: 0 auto;" action="{{route('forms.feedback.store')}}">
        @csrf
        <div class="form-group" style="width: 400px;">
            <label for="title">Имя пользователя</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group" style="width: 400px;">
            <label for="description">Комментарий</label>
            <textarea class="form-control" name="description" id="description"></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-success" style="">Сохранить</button>
    </form>
@endsection
