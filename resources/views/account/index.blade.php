<h1>Привет, {{Auth::user()->name}}</h1>
<br>
@if(Auth::user()->is_admin)
<a href="{{route('admin.catalog.index')}}" style="color: green;">В админку</a>
@endif
<br>
<a href="{{route('news.index')}}" style="color: green;">В новости</a>
<br>

@if (\Auth::user()->avatar)
    <img src="{{\Auth::user()->avatar}}" alt="">
    @endif

<a href="{{route('account.logout')}}" style="color:green;">Выход</a>

@include('layouts.parse')
