@extends('layouts.app')
@section('title' , 'User Login')

@section('content')
{{-- <div class="md:px-0 px-14"> --}}
<form class="grid gap-6 md:w-1/2 w-auto md:mx-auto px-4 mx-4 shadow-blue-400 shadow-md md:px-4 py-8 rounded mt-20" method="POST" action="users/login">
    <h1 class="uppercase text-2xl">Login to your account now</h1>
    @csrf
    <div class="grid gap-2">
        <label>Email : </label>
        <input class="py-3 px-4 border-2 border-gray-500 outline-blue-500 rounded" type="email" name="email" placeholder="Enter your email" value="{{old('name')}}">
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
    <button class="py-3 px-6 bg-gray-50 border-2 border-gray-500 hover:bg-gray-100  font-bold text-gray-600 rounded justify-self-start">Login</button>
</form>
{{-- </div> --}}
@endsection
