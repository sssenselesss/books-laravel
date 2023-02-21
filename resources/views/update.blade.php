@extends('layout.index')
@section('content')
    <div class="auth">
        <h2>Редактировать</h2>
        <div class="wrapper">
            <form action="{{route('book.updatePost',$book)}}" method="post" enctype="multipart/form-data">
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
                <input type="text" name="title" placeholder="Название" class="input" value="{{$book->title}}">
                <textarea name="content" class="input" placeholder="Описание">{{$book->content}}</textarea>
                <input type="text" name="author" placeholder="Автор" class="input" value="{{$book->author}}">
                <input type="file" name="file" placeholder="Автор" class="input">

                <select name="category_id" class="input">
                    @foreach($categories as $category)
                        <option
                            @if($book->category_id === $category->id) selected @endif
                            value="{{$category->id}}">{{$category['category']}}</option>
                    @endforeach
                </select>

                <input type="submit" class="button input" value="Редактировать">
            </form>
        </div>
    </div>
@endsection
