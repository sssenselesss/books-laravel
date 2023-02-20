@extends('layout.index')

@section('content')
    <div class="single">
        <div class="single-image">
            <img src="{{$book->image_url}}" alt="">
        </div>
        <div class="imageDesc">
            <h1> {{$book->title}}</h1>
            <div >Описание: {{$book->content}}</div>
            <div>Автор: {{$book->author}}</div>
            <div>Категория: {{$book->category()->category}}</div>

            <div class="adminFunc">
                <a href="{{route('book.delete',$book->id)}}" class="button">Удалить</a>
                <a href="{{route('book.update',$book)}}" class="button">Редактировать</a>
            </div>
        </div>
    </div>
@endsection
