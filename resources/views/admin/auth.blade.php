@extends('layouts.app')
@section('title' , 'Admin Auth')

@section('content')
<x-flash-message></x-flash-message>
<form class="grid gap-6 w-1/2 mx-auto" method="POST" action="{{route('admin.login')}}">
    @csrf
    <div class="grid gap-2">
        <label>Email : </label>
        <input class="py-2 px-2 outline outline-blue-500 rounded" type="email" name="email" placeholder="Enter your email" value="{{old('name')}}">
        @error('email')
        <p class="text-red-500 text-xs">{{$errors->first('email')}}</p>
        @enderror
    </div>
    <div class="grid gap-2">
        <label>Password : </label>
        <input class="py-2 px-2 outline outline-blue-500 rounded" type="password" name="password" placeholder="Enter your password" value="{{old('password')}}">
        @error('password')
        <p class="text-red-500 text-xs">{{$errors->first('password')}}</p>
        @enderror
    </div>
    <input class="py-2 px-4 bg-blue-500 font-bold text-gray-100 rounded justify-self-start" type="submit" value="Login">

</form>
@endsection
