@extends('layout.index')
@section('content')
    <div class="auth">
        <h2>Добавить книгу</h2>
        <div class="wrapper">
            <form action="{{route('book.create')}}" method="post" enctype="multipart/form-data">
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
                <input type="text" name="title" placeholder="Название" class="input">
                <textarea name="content" class="input" placeholder="Описание"></textarea>
                <input type="text" name="author" placeholder="Автор" class="input">
                <input type="file" name="file" placeholder="Автор" class="input">

                <select name="category_id" class="input">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category['category']}}</option>
                    @endforeach
                </select>

                <input type="submit" class="button input" value="Добавить книгу">
            </form>
        </div>
    </div>
@endsection
