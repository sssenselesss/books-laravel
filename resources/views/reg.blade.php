@extends('layout.index')
@section('content')
<div class="auth">
    <h2>Регистрация</h2>
    <div class="wrapper">
        <form action="{{route('register')}}" method="post">
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
            <input type="text" name="name" placeholder="Ваше имя" class="input">
            <input type="text" name="email" placeholder="Ваша почта" class="input">
            <input type="text" name="password" placeholder="Пароль" class="input">
            <input type="text" name="re_pass" placeholder="Повторите пароль" class="input">
            <input type="submit" class="button input" value="Регистрация">
        </form>
    </div>
</div>
@endsection
