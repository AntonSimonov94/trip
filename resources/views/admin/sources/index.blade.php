@extends('layouts.admin');
@section('content')
    <h1 class="h2">Список источников</h1>
    @include('inc.message')
    <table class="table">

        <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Автор</th>
            <th>Страна</th>
            <th>Год издательства</th>
            <th>Дата добавления</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sourcesList as $source)
            <tr>
                <th>{{$source->id}}</th>
                <th>{{$source->title}}</th>
                <th>{{$source->author}}</th>
                <th>{{$source->country}}</th>
                <th>{{$source->year}}</th>
                <th>{{$source->created_at}}</th>
                <th><a href="{{route('admin.sources.edit',['source'=>$source])}}">Update  </a>
                    <a href="javascript:;" class="delete" rel="{{$source->id}}">Delete</a>
                </th>
            </tr>

        @endforeach
        </tbody>


    </table>


    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.sources.create') }}">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Добавить источник</button></a></div>

    </div>
@endsection
@push('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            const el = document.querySelectorAll(".delete");
            el.forEach(function(e, k) {
                e.addEventListener('click', function() {
                    const id = this.getAttribute('rel');
                    if(confirm(`Удалить новость ${id} ?`)) {
                        send('/admin/sources/' + id).then(() => {
                            location.reload();
                        })
                    }
                });
            });
        });
        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                        .getAttribute('content')
                }
            });
            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush
