@extends('layouts.admin');
@section('content')
    <h1 class="h2">Список новостей</h1>
    @include('inc.message')
    <table class="table">

        <thead>
        <tr>
            <th>ID</th>
            <th>Заголовок</th>
            <th>Автор</th>
            <th>Описание</th>
            <th>Дата добавления</th>
            <th>Понравилось</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($newsList as $news)
            <tr>
                <th>{{$news->id}}</th>
                <th>{{$news->title}}</th>
                <th>{{$news->producer}}</th>
                <th>{{$news->description}}</th>
                <th>{{$news->created_at}}</th>
                <th>{{$news->likes}}</th>
                <th><a href="{{route('admin.news.edit',['news'=>$news])}}">Update  </a>
                    <a href="javascript:;" class="delete" rel="{{$news->id}}">Delete</a></th>
            </tr>

        @endforeach
        </tbody>


    </table>


    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.news.create') }}">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Добавить новость</button></a></div>

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
                        send('/admin/news/' + id).then(() => {
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
