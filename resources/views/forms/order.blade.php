@extends('layouts.main')
@section('news')
    <div class="container" style="width:1000px;margin: 0 auto;">
        <h1 class="display-3">Форма заказа</h1>
    </div>
@endsection

@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif


    <form method="post" style="width:500px;margin: 0 auto;" action="{{route('forms.order.store')}}">
        @csrf
        <div class="form-group" style="width: 400px;">
            <label for="title">Имя пользователя</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group" style="width: 400px; margin-top:20px;">
            <label for="title">Номер телефона</label><br>
            <input type="tel" id="phone" name="phone"
                   pattern="[8]{1}[0-9]{3}[0-9]{3}[0-9]{2}[0-9]{2}"
                   required><br>
            <small>Формат: 80000000000</small>
        </div>
        <div class="form-group" style="width: 400px;">
            <label for="title">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group" style="width: 400px; margin-top:20px;">
            <label for="description">Комментарий</label>
            <textarea class="form-control" name="description" id="description"></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-success" style="">Сохранить</button>
    </form>
@endsection
