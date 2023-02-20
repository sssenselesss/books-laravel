<header class="header">
    <div class="wrapper">
        <a href="{{route('main')}}" class="logo">
            Логотип
        </a>
        @guest()
            <div class="btns">
                <a href="{{route('auth')}}" class="button">Войти</a>
                <a href="{{route('reg')}}" class="button">Регистрация</a>
            </div>
        @endguest

        @auth()

            <div class="btns">

                @if(\Illuminate\Support\Facades\Auth::user()->is_admin())
                    <a href="{{route('add')}}" class="button">Добавить книгу</a>
                @endif
                <a href="{{route('logout')}}" class="button">Выйти</a>

            </div>
        @endauth
    </div>
</header>
