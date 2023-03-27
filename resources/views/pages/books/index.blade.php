@extends('layouts.app')
@section('title' , 'Books')

@section('content')
<x-flash-message></x-flash-message>
    <div class="banner">
        <form class="flex justify-center mx-auto justify-self-center w-full gap-6 mt-40" action="/books">
            <input class="pl-3 py-3 px-4 w-1/2 border-2 border-gray-100 rounded" type="text" name="search" placeholder="search...">
            <button class="py-3 px-6 font-bold bg-gray-100 hover:bg-gray-700 hover:text-gray-100 rounded text-gray-800 border border-gray-100">Search</button>
        </form>
    </div>
<div class="grid justify-around grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-y-10 gap-x-6 mx-10 mt-20">
    @unless(count($books) == 0)
    @foreach ($books as $book)
    <div class="w-auto rounded-t pb-4">
        <img class="w-full rounded-t" style="height: 420px" src="{{asset('storage/' . $book->image)}}" alt="">
    <h1 class="font-bold mt-2"> {{$book->title}} </h1>
    <p>Category : {{$book->category->name}}</p>
    <div class="flex gap-6 mt-2">
        <form id="likeForm" action="/books/like" method="POST">
            @csrf
            <input type="text" hidden value="{{auth()->user()->id}}" name="user_id" id="userId">
            <input type="text" hidden value="{{$book->id}}" name="book_id" id="bookId">
            <button class="doLike" id="like"><i class="fa-solid fa-thumbs-up like @if($book->is_liked) text-red-500 @endif"></i> {{$book->likes_count}} </button>
        </form>
        <form action="/books/dislike" method="POST">
            @csrf
            <input type="text" hidden value="{{auth()->user()->id}}" name="user_id">
            <input type="text" hidden value="{{$book->id}}" name="book_id">
            <button class="doDislike"><i class="fa-solid fa-thumbs-down @if($book->is_disliked) text-red-500 @endif disLike"></i> {{$book->dislikes_count}} </button>
        </form>
        <form action="books/addToFavourites" method="POST">
            @csrf
            <input type="text" hidden value="{{auth()->user()->id}}" name="user_id">
            <input type="text" hidden value="{{$book->id}}" name="book_id">
            <button class="addToFavourites"><i class="fa-solid fa-heart @if($book->is_in_favourites) text-red-500 @endif favourite"></i></button>
        </form>
        <a href="/books/{{$book->id}}"><i class="fa-sharp fa-solid fa-eye"></i></a>
    </div>
</div>
    @endforeach

    @else
    <p class="mx-auto">No books found</p>
    @endunless
</div>
<div class="mt-6 p-4">
    {{$books->links()}}
</div>
@endsection
