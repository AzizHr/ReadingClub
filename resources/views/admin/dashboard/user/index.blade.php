@extends('layouts.app')
@section('title' , 'Users')

@section('content')
<div class="relative overflow-x-auto pt-6">
    <table
      class="w-full text-sm text-left text-gray-500 mt-6"
    >
      <thead
        class="text-xs text-gray-700 uppercase bg-gray-50"
      >
        <tr>
          <th scope="col" class="px-6 py-3">ID</th>
          <th scope="col" class="px-6 py-3">NAME</th>
          <th scope="col" class="px-6 py-3">EMAIL</th>
          <th scope="col" class="px-6 py-3">PASSWORD</th>
        </tr>
      </thead>
      <tbody class="text-gray-700">
        @foreach ($users as $user)
        <tr class="bg-white border-b">
          <td class="px-6 py-4">{{ $user->id }}</td>
          <td class="px-6 py-4">{{ $user->name }}</td>
          <td class="px-6 py-4">{{ $user->email }}</td>
          <td class="px-6 py-4">{{ $user->password }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
