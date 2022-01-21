@extends('layouts.main')

@section('news')
    <div class="container">
        <h1 class="display-3">Актуальные новости про {{$news}}</h1>
        @foreach ($catalog as $category => $products)
            @if ($name == $category)
                @php $n=1 @endphp
                @foreach ($products as $product => $des)
                    @if ($news == $product)
                        <p>{{ $des }}</p>
                    @endif
                @endforeach
            @endif
        @endforeach
    </div>
@endsection

