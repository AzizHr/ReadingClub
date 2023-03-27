@extends('layouts.app')
@section('title' , 'Add New Book')

@section('content')
<form class="grid md:w-1/2 w-auto  md:mx-auto mx-4 gap-4 mt-10 pb-6" method="POST" action="/books/new" enctype="multipart/form-data">
    @csrf
    <h1 class="uppercase text-xl shadow-md shadow-blue-300 p-2">Create a new book</h1>
    <div class="grid gap-2">
        <label>Title : </label>
        <input class="py-3 px-4 rounded border-2 border-gray-700" type="text" name="title" placeholder="Enter the book's title" value="{{old('title')}}" >
        @error('title')
        <p class="text-red-500 text-xs">{{$errors->first('title')}}</p>
        @enderror
    </div>
    <div class="grid gap-2">
        <label>Image : </label>
        <input class="py-3 px-4 rounded border-2 border-gray-700" type="file" name="image">
        @error('image')
        <p class="text-red-500 text-xs">{{$errors->first('image')}}</p>
        @enderror
    </div>
    <div class="grid gap-2">
        <label>Description : </label>
        <textarea class="py-3 px-4 rounded border-2 border-gray-700" name="description" cols="30" rows="10" placeholder="Add description"> {{old('description')}} </textarea>
        @error('description')
        <p class="text-red-500 text-xs">{{$errors->first('description')}}</p>
        @enderror
    </div>
    <div class="grid gap-2">
        <label>Author : </label>
        <input class="py-3 px-4 rounded border-2 border-gray-700" type="text" name="author" placeholder="Enter the author name" value="{{old('author')}}" >
        @error('author')
        <p class="text-red-500 text-xs">{{$errors->first('author')}}</p>
        @enderror
    </div>

    <div class="grid gap-2">
        <label>Category : </label>
        <select class="py-3 px-4 rounded border-2 border-gray-700" name="category_id">
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>

    <button class="py-3 px-6 bg-gray-600 text-gray-100 font-bold rounded justify-self-start mt-2 hover:bg-gray-700">Submit</button>

</form>
@endsection
