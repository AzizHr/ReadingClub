@extends('layouts.app')
@section('title' , 'Book')

@section('content')

    <div class="flex md:px-10 md:py-10 md:gap-10 px-4 py-4 gap-6 mt-20">
        <img style="width: 30%" src="{{$book->image}}" alt="">
    <div class="grid items-center">
        <h1 class="font-bold"> {{$book->title}} </h1>
        <p class=""> {{$book->description}} </p>
    <div class="flex gap-6">
        <form action="/books/like" method="POST">
            @csrf
            <input type="text" hidden value="3" name="user_id">
            <input type="text" hidden value="{{$book->id}}" name="book_id">
            <button class="doLike"><i class="fa-solid fa-thumbs-up like @if($book->is_liked) text-red-500 @endif"></i> {{$book->likes_count}} </button>
        </form>
        <form action="/books/dislike" method="POST">
            @csrf
            <input type="text" hidden value="3" name="user_id">
            <input type="text" hidden value="{{$book->id}}" name="book_id">
            <button class="doDislike"><i class="fa-solid fa-thumbs-down @if($book->is_disliked) text-red-500 @endif disLike"></i> {{$book->dislikes_count}} </button>
        </form>
        <form action="books/addToFavourites" method="POST">
            @csrf
            <input type="text" hidden value="3" name="user_id">
            <input type="text" hidden value="{{$book->id}}" name="book_id">
            <button class="addToFavourites"><i class="fa-solid fa-heart @if($book->is_in_favourites) text-red-500 @endif favourite"></i></button>
        </form>
    </div>
    </div>
</div>
@endsection
