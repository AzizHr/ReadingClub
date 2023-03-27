@extends('layouts.app')
@section('title' , 'Update a Category')

@section('content')
<form class="grid gap-6 md:w-1/2 w-auto  md:mx-auto mx-4 mt-10" method="POST" action="/categories/{{$category->id}}/update">
    @csrf
    @method('PUT')
    <h1 class="uppercase text-xl shadow-md shadow-blue-300 p-2">Create a new category</h1>
    <div class="grid gap-2">
        <label>Name : </label>
        <input class="py-3 px-4 rounded border-2 border-gray-700" type="text" name="name" placeholder="{{$category->name}}">
        @error('name')
        <p class="text-red-500 text-xs">{{$errors->first('name')}}</p>
        @enderror
    </div>
    <button class="py-3 px-4 bg-gray-700 rounded font-bold text-gray-100 justify-self-start">Submit</button>
</form>
@endsection

