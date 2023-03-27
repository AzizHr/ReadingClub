@extends('layouts.app')
@section('title' , 'Groups')

@section('content')
<x-flash-message></x-flash-message>
<div class="banner">
    <form class="flex justify-center mx-auto justify-self-center w-full gap-6 mt-40" action="/groups">
        <input class="pl-3 py-3 px-4 w-1/2 border-2 border-gray-100 rounded" type="text" name="search" placeholder="search...">
        <button class="py-3 px-6 font-bold bg-gray-100 hover:bg-gray-700 hover:text-gray-100 rounded text-gray-800 border border-gray-100">Search</button>
    </form>
</div>
<div class="grid justify-around grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-y-10 gap-x-8 mx-10 mt-20">
    @unless(count($groups) == 0)
    @foreach ($groups as $group)
    <div class="grid gap-2 rounded shadow-lg py-2 px-2">
        <img src="{{asset('storage/' . $group->image)}}" alt="" style="width: 319.8px; height: 239.85px;">
    <a href="groups/{{$group->id}}" class="font-bold mt-2 text-gray-700 hover:underline"> {{$group->name}} </a>
    <p class="text-gray-600"> {{$group->members_count}} members</p>
    <div class="flex gap-6 mt-2">
        <form action="groups/join" method="POST">
            @csrf
            <input type="text" hidden value="{{auth()->user()->id}}" name="user_id">
            <input type="text" hidden value="{{$group->id}}" name="group_id">
            @if ($group->is_joined)
            <button class="py-2 px-6 bg-red-500 rounded font-bold text-gray-100">Leave</button>
            @else
            <button class="py-2 px-6 bg-blue-500 rounded font-bold text-gray-100">Join</button>
            @endif
        </form>
    </div>
</div>
    @endforeach
    @else
    <p>No groups found</p>
    @endunless
</div>
<div class="mt-6 p-4">
    {{$groups->links()}}
</div>
@endsection
