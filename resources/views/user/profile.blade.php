@extends('layouts.app')
@section('title' , 'Profile')

@section('content')
<div class="w-full bg-gradient-to-r from-slate-400 py-6 px-4 flex items-center md:justify-start justify-center gap-6">
    <div class="rounded-full w-36 h-36 border-4 border-gray-100">
        <img src="{{asset('storage/' . auth()->user()->avatar)}}" class="rounded-full bg-gray-300 w-full h-full" />
    </div>
    @auth
    <h1 class="text-2xl font-bold text-gray-100">{{auth()->user()->name}}</h1>
    @else
    <h1 class="text-2xl font-bold text-gray-200">Aziz Harkati</h1>
    @endauth
</div>

@auth
<div class="grid gap-6 mt-10">
    <form class="grid gap-6 md:w-1/2 w-full md:px-0 px-4 mx-auto" action="/profile/update" method="POST">
        @csrf
        @method('PUT')
        <div class="grid gap-2">
            <label>Email : </label>
            <input class="py-3 px-4 outline outline-gray-600" type="email" name="email" value="{{auth()->user()->email}}">
            @error('email')
            <p class="text-red-500 text-xs">{{$errors->first('email')}}</p>
            @enderror
        </div>
        <div class="grid gap-2">
            <label>Name : </label>
            <input class="py-3 px-4 outline outline-gray-600" type="name" name="name" value="{{auth()->user()->name}}">
            @error('name')
            <p class="text-red-500 text-xs">{{$errors->first('name')}}</p>
            @enderror
        </div>
        <button class="py-3 px-4 bg-gray-600 font-bold text-gray-100 justify-self-start">Update Profile Info</button>
    </form>
</div>
@endauth
@endsection
