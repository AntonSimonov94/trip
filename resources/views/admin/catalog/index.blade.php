@extends('layouts.admin');
@section('content')
<h1 class="h2">Список категорий</h1>
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
        <a href="{{ route('admin.catalog.create') }}">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Добавить категорию</button></a></div>

</div>
@endsection
