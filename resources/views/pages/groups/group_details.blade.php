@extends('layouts.app')
@section('title' , 'Group')

@section('content')
<div class="bg-gray-100 shadow-md shadow-gray-400 py-4 px-4 bg-cover bg-no-repeat bg-center" style="background-image: url('{{asset('storage/' . $group->image)}}')">
    <h1 class="font-bold md:text-left md:text-3xl uppercase text-xl text-center">{{$group->name}}</h1>
    <h1 class="font-bold md:text-left text-center mt-2">Members : {{$group->members_count}}</h1>
    <div class="flex md:justify-start justify-center mt-6 gap-4">
        @if(!$group->is_owner)
        <form class="font-bold md:text-left text-center" action="{{route('join')}}" method="POST">
            @csrf
            <input type="text" hidden value="{{auth()->user()->id}}" name="user_id">
            <input type="text" hidden value="{{$group->id}}" name="group_id">
            <button class="py-2 px-6 bg-blue-500 hover:bg-blue-600 rounded font-bold text-gray-100"><?php echo  $group->is_joined ? 'Leave' : 'Join'; ?></button>
        </form>
        @endif
        @if($group->is_owner)
    <form action="/groups/remove" method="POST">
        @csrf
        @method('DELETE')
        <input type="text" hidden value="{{auth()->user()->id}}" name="user_id">
        <input type="text" hidden value="{{$group->id}}" name="group_id">
        <button class="py-2 px-6 bg-red-600 rounded font-bold text-gray-100">Delete</button>
    </form>
    @endif
    </div>
    <p class="md:text-left text-center mt-4">About : {{$group->book->title}}</p>
</div>


@if($group->is_joined)
<div class="flex relative w-full mt-10">
    <div class="grid gap-3 w-full mx-auto shadow-md py-4 md:px-10 px-4 overflow-auto h-72 justify-between">
        <div class="grid gap-3 h-fit">
        @foreach ($group->comments as $comment)
            <div class="flex gap-2 justify-center items-center">
                <img class="rounded-full w-12 h-12" src="{{asset('storage/' . $comment->user->avatar)}}" alt="">
                <p class="rounded px-2 py-2 w-fit h-fit @if($comment->user->id == auth()->user()->id) bg-green-200 @else bg-blue-200 @endif">{{$comment->content}}</li>
            </div>
        @endforeach
        </div>
        <form class="fixed mt-56 flex gap-4" action="/comment" method="POST">
            @csrf
            <div class="flex self-end gap-4">
                <input class="px-2 py-1 border-2 border-gray-600 outline-gray-700 rounded" type="text" name="content" placeholder="comment...">
                @error('content')
        <p class="text-red-500 text-xs">{{$errors->first('content')}}</p>
        @enderror
            <input class="px-2" hidden type="text" value="{{$group->id}}" name="group_id">
            <input class="px-2 h-4" hidden type="text" value="{{auth()->user()->id}}" name="user_id">
            <button class="border-2 border-gray-600 hover:border-gray-900 rounded px-2 flex justify-center items-center hover:bg-gray-400"><i class="fa-regular fa-paper-plane"></i></button>
            </div>
        </form>
    </div>
        <div class="shadow-lg md:w-1/5 w-1/3 overflow-auto h-72">
            <h1 class="p-2 font-bold">Members</h1>
            @foreach ($group->members as $member)
            <h1 class="px-4">{{$member->name}}</h1>
            <hr class="mt-1">
            @endforeach
        </div>
</div>

@endif
@endsection
