@extends('layout.master')

@section('title' , 'Login')

@section('content')
<div class="bg-grey-lighter min-h-screen flex flex-col">
    <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
        <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
            <h1 class="mb-8 text-3xl text-center">Welcome Back!</h1>

            <input
                type="text"
                class="block border border-grey-light w-full p-3 rounded mb-4"
                name="email"
                placeholder="Email" />

            <input
                type="password"
                class="block border border-grey-light w-full p-3 rounded mb-4"
                name="password"
                placeholder="Password" />

            <button
                type="submit"
                class="w-full text-center py-3 rounded bg-green-500 text-white hover:bg-green-dark focus:outline-none my-1"
            >Login</button>
            <div class="text-grey-dark mt-6">
                No account?
                <a class="no-underline border-b border-blue text-blue" href="/register">
                    Sign up
                </a>.
            </div>
        </div>
    </div>
</div>
@endsection
