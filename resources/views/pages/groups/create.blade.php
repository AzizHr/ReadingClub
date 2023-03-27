@extends('layouts.app')
@section('title' , 'Add New Book')

@section('content')
<form class="grid gap-6 md:w-1/2 w-auto md:mx-auto mx-4 md:mt-20 mt-10" method="POST" action="/add" enctype="multipart/form-data">
    @csrf
    <div class="grid gap-1">
        <label>Name : </label>
        <input class="py-3 px-4 rounded border-2 border-gray-700" type="text" name="name" placeholder="Enter the group's name">
        @error('name')
        <p class="text-red-500 text-xs mt-2">{{$errors->first('name')}}</p>
        @enderror
    </div>
    <div class="grid gap-2">
        <label>Image : </label>
        <input class="py-3 px-4 rounded border-2 border-gray-700" type="file" name="image">
    </div>
    <div class="grid hidden">
        <label>User ID : </label>
        <input class="py-3 px-4 mt-2 outline outline-blue-500 rounded" type="text" name="user_id" value="{{auth()->user()->id}}" placeholder="Enter the User's ID">
    </div>

    <div class="grid gap-1">
        <label>Book : </label>
        <select class="py-3 px-4 rounded border-2 border-gray-700" name="book_id">
            @foreach($books as $book)
            <option value="{{$book->id}}">{{$book->title}}</option>
            @endforeach
        </select>
    </div>

    <button class="py-3 px-4 bg-gray-600 hover:bg-gray-700 rounded text-gray-100 font-bold mt-6">Submit</button>

</form>
@endsection
