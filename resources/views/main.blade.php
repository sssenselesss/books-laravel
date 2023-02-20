@extends('layout.index')
@section('content')


        <div class="books">
            <div class="wrapper">
                @foreach($books as $book)
                <div class="book">
                    <div class="book-image">
                        <img src="{{$book->image_url}}" alt="">
                    </div>
                    <div class="title"> {{$book->title}}</div>
                    <a href="{{route('single',$book->id)}}" class="button">Подробнее</a>
                </div>
                @endforeach
            </div>
        </div>


@endsection

