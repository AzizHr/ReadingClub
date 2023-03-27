@extends('layouts.app')
@section('title' , 'Categories')

@section('content')
<div class="relative overflow-x-auto pt-6">
    <x-flash-message></x-flash-message>
    <a href="/dashboard/categories/create" class="py-1.5 px-4 bg-blue-500 rounded text-gray-100 mt-6 mb-6 mx-6 hover:bg-blue-600">Add New <i class="fa-solid fa-plus"></i></a>
    <table
      class="w-full text-sm text-left text-gray-500 mt-6"
    >
      <thead
        class="text-xs text-gray-700 uppercase bg-gray-50"
      >
        <tr>
          <th scope="col" class="px-6 py-3">ID</th>
          <th scope="col" class="px-6 py-3">NAME</th>
          <th scope="col" class="px-6 py-3">EDIT</th>
          <th scope="col" class="px-6 py-3">DELETE</th>
        </tr>
      </thead>
      <tbody class="text-gray-700">
        @foreach ($categories as $category)
        <tr class="bg-white border-b">
          <td class="px-6 py-4">{{ $category->id }}</td>
          <td class="px-6 py-4">{{ $category->name }}</td>
          <td class="px-6 py-4">
            <a href="/dashboard/categories/{{$category->id}}"><i class="fa-solid fa-pen-to-square text-green-500"></i></a>
          </td>
          <td class="px-6 py-4">
            <form action="/categories/{{$category->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button><i class="fa-solid fa-trash text-red-500"></i></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
