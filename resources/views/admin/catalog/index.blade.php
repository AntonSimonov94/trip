@extends('layouts.admin');
@section('content')
<h1 class="h2">Список категорий</h1>
@include('inc.message')
<table class="table">

    <thead>
    <tr>
    <th>ID</th>
    <th>Заголовок</th>
    <th>Описание</th>
    <th>Дата добавления</th>
    <th>Действия</th>
    </tr>
    </thead>
    <tbody>
    @foreach($catalogsList as $catalogs)
    <tr>
        <th>{{$catalogs->id}}</th>
        <th>{{$catalogs->title}}</th>
        <th>{{$catalogs->description}}</th>
        <th>{{$catalogs->created_at}}</th>
        <th><a href="{{route('admin.catalog.edit',['catalog'=>$catalogs])}}">Update  </a><a href="">Delete</a></th>
    </tr>

    @endforeach
    </tbody>
</table>


<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
        <a href="{{ route('admin.catalog.create') }}">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Добавить категорию</button></a></div>

</div>
@endsection
