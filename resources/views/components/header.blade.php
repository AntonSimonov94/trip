<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="{{route('admin.catalog.index')}}">Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('news.index')}}">Каталог <span class="sr-only">(current)</span></a>
            </li>
        </ul>

    </div>
    <div>
    <ul class="navbar-nav ms-auto">
        <!-- Authentication Links -->
        @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Вход') }}</a>
                </li>
            @endif

            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                </li>
            @endif
        @else
            <li  class="nav-item">>
                <a class="nav-link" href="{{ route('account.logout') }}">
                    {{ __('Выход') }}
                </a>

            </li>
        @endguest
    </ul>
    </div>

</nav>
