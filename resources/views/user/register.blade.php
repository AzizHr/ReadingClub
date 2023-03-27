@extends('layouts.app')
@section('title' , 'User Login')

@section('content')
<div class="md:px-0 px-14">
    <form class="grid gap-6 md:w-1/2 w-full md:mx-auto px-8 shadow-blue-400 shadow-md md:px-4 py-8 rounded mt-6" method="POST" action="users/register" enctype="multipart/form-data">
        <h1 class="uppercase text-2xl">Create your account now</h1>
        @csrf

        <div class="grid gap-2">
            <label>Name : </label>
            <input class="py-3 px-4 border-2 border-gray-500 outline-blue-500 rounded" type="text" name="name" placeholder="Enter your password" value="{{old('name')}}">
            @error('name')
            <p class="text-red-500 text-xs">{{$errors->first('name')}}</p>
            @enderror
        </div>
        <div class="grid gap-2">
            <label>Avatar : </label>
            <input class="py-3 px-4 rounded border-2 border-gray-700" type="file" name="avatar">
        </div>
        <div class="grid gap-2">
            <label>Email : </label>
            <input class="py-3 px-4 border-2 border-gray-500 outline-blue-500 rounded" type="email" name="email" placeholder="Enter your email" value="{{old('email')}}">
            @error('email')
            <p class="text-red-500 text-xs">{{$errors->first('email')}}</p>
            @enderror
        </div>
        <div class="grid gap-2">
            <label>Password : </label>
            <input class="py-3 px-4 border-2 border-gray-500 outline-blue-500 rounded" type="password" name="password" placeholder="Enter your password" value="{{old('password')}}">
            @error('password')
            <p class="text-red-500 text-xs">{{$errors->first('password')}}</p>
            @enderror
        </div>
        <div class="grid gap-2">
            <label>Confirm Password : </label>
            <input class="py-3 px-4 border-2 border-gray-500 outline-blue-500 rounded" type="password" name="password_confirmation" placeholder="Enter your password" value="{{old('password_confirmation')}}">
            @error('password_confirmation')
            <p class="text-red-500 text-xs">{{$errors->first('password_confirmation')}}</p>
            @enderror
        </div>
        <button class="py-3 px-6 bg-gray-50 border-2 border-gray-500 hover:bg-blue-500 hover:text-gray-100 hover:border-0 font-bold text-gray-600 rounded justify-self-start">Register</button>
    </form>
</div>
@endsection
