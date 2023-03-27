@extends('layouts.app')
@section('title' , 'Books')

@section('content')
<div class="relative overflow-x-auto pt-6">
    <x-flash-message></x-flash-message>
    <a href="/dashboard/books/create" class="py-1.5 px-4 bg-blue-500 rounded text-gray-100 mt-6 mb-6 mx-6 hover:bg-blue-600">Add New <i class="fa-solid fa-plus"></i></a>
    <table
      class="w-full text-sm text-left text-gray-500 mt-6"
    >
      <thead
        class="text-xs text-gray-700 uppercase bg-gray-50"
      >
        <tr>
          <th scope="col" class="px-6 py-3">ID</th>
          <th scope="col" class="px-6 py-3">IMAGE</th>
          <th scope="col" class="px-6 py-3">TITLE</th>
          <th scope="col" class="px-6 py-3">DESCRIPTION</th>
          <th scope="col" class="px-6 py-3">AUTHOR</th>
          <th scope="col" class="px-6 py-3">ARCHIVED</th>
          <th scope="col" class="px-6 py-3">CATEGORY</th>
          <th scope="col" class="px-6 py-3">EDIT</th>
          <th scope="col" class="px-6 py-3">DELETE</th>
        </tr>
      </thead>
      <tbody class="text-gray-700">
        @foreach ($books as $book)
        <tr class="bg-white border-b">
          <td class="px-6 py-4">{{ $book->id }}</td>
          <td class="py-2"><img class="w-24 h-24 rounded" src="{{asset('storage/' . $book->image)}}" alt=""></td>
          <td class="px-6 py-4">{{ $book->title }}</td>
          <td class="px-6 py-4">{{ $book->description }}</td>
          <td class="px-6 py-4">{{ $book->author }}</td>
          <td class="px-6 py-4">@if($book->is_archived == 1) <i class="text-green-500">True</i> @else <i class="text-red-500">False</i> @endif</td>
          <td class="px-6 py-4">{{ $book->category->name }}</td>
          <td class="px-6 py-4">
            <a href="/dashboard/books/{{$book->id}}/edit"><i class="fa-solid fa-pen-to-square text-green-500"></i></a>
          </td>
          <td class="px-6 py-4">
            <form action="/books/{{$book->id}}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" value="1" hidden name="is_archived">
                <button><i class="fa-solid fa-trash text-red-500"></i></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
