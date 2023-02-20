@extends('layout.index')
@section('content')
    <div class="auth">
        <h2>Авторизация</h2>
        <div class="wrapper">

            <form action="{{route('login')}}" method="post">
                <div>
                    @if($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>

                    @endif

                </div>
                @csrf
                <input type="text" name="email" placeholder="Ваша почта" class="input">
                <input type="text" name="password" placeholder="пароль" class="input">
                <input type="submit" class="button input" value="Войти">
            </form>
        </div>
    </div>
@endsection
