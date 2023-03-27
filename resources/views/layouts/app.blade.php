<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    {{-- <a href="/new">New Group</a> --}}

    <nav class="flex justify-between px-6 py-6 justify-center">
        <div class="flex justify-center">
            <h1 class="font-bold text-xl">LetsRead</h1>
        </div>
        @auth
        @if(!auth()->user()->is_admin)
        <ul class="md:flex text-center grid hidden gap-10 md:mt-0 mt-16 md:mx-0 mx-auto" id="menu">
            <li>
                <a href="/books">Books</a>
            </li>
            <li>
                <a href="/groups">Groups</a>
            </li>
            <li>
                <a href="/new">New Group</a>
            </li>
            <li>
                <a href="/profile" class="font-bold"> {{auth()->user()->name}} </a>
            </li>
        </ul>
        <div class="grid gap-4 relative">
            <ul class="flex gap-4 justify-center">
                <a class="flex md:hidden self-start mt-3" href="" id="open">
                    <i class="fa-solid fa-bars"></i>
                </a>
                <a class="flex self-start" href="" id="openFavouritesMenu">
                    <lord-icon
    src="https://cdn.lordicon.com/xryjrepg.json"
    trigger="click"
    style="width:42px;height:42px">
</lord-icon>
                </a>
                <li>
                    <form action="/users/logout" method="POST">
                        @csrf
                        <button class="py-2 px-3 text-gray-100 bg-red-500 rounded font-bold">Logout</button>
                    </form>
                </li>
            </ul>
            <div class="fixed w-1/3 grid gap-2 bg-gray-100 hidden shadow-md shadow-white rounded py-2 top-24 right-20" id="FavouritesMenu">
                @if(count(auth()->user()->favourites) == 0)
                <p class="px-4">No fovourites found</p>
                @else
                @foreach (auth()->user()->favourites as $favourite)
                <form class="flex justify-between px-4" action="favourites/remove" method="POST">
                    @csrf
                    @method('DELETE')
                    <p>{{$favourite->title}}</p>
                    <input type="text" name="user_id" hidden value="{{auth()->user()->id}}">
                    <input type="text" name="book_id" hidden value="{{$favourite->id}}">
                    <button>
                        <lord-icon
                            src="https://cdn.lordicon.com/jmkrnisz.json"
                            trigger="hover"
                            colors="primary:#e83a30"
                            style="width:30px;height:30px">
                        </lord-icon>
                    </button>
                </form>
                <hr>
                @endforeach
                @endif
            </div>
        </div>
        @else
        <ul class="md:flex text-center grid hidden gap-10 md:mt-0 mt-16 md:mx-0 mx-auto" id="menu">
            <li>
                <a href="/dashboard/books">Books</a>
            </li>
            <li>
                <a href="/dashboard/categories">Categories</a>
            </li>
            <li>
                <a href="/profile" class="font-bold"> {{auth()->user()->name}} </a>
            </li>
        </ul>
        <ul class="flex gap-4 justify-center">
            <a class="flex md:hidden self-start mt-3" href="" id="open">
                <i class="fa-solid fa-bars"></i>
            </a>
            <li>
                <form action="/users/logout" method="POST">
                    @csrf
                    <button class="py-2 px-3 text-gray-100 bg-red-500 rounded font-bold">Logout</button>
                </form>
            </li>
        </ul>
        @endif
        @else
        <ul class="md:flex text-center grid hidden gap-10 md:mt-0 mt-16 mx-auto" id="menu">
            <li>
                <a href="/books">Books</a>
            </li>
            <li>
                <a href="/groups">Groups</a>
            </li>
        </ul>
        <ul class="flex gap-4 justify-center">
            <a class="flex md:hidden" href="" id="open">
                <i class="fa-solid fa-bars"></i>
            </a>
            <li>
                <a href="/register" class="py-2 px-3 text-gray-100 bg-gray-700 rounded font-bold">Register</a>
            </li>
            <li>
                <a href="/login" class="py-2 px-3 text-gray-100 bg-red-500 rounded font-bold">Login</a>
            </li>
        </ul>
        @endauth
    </nav>
    @yield('content')

    <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
    @vite('resources/js/custom.js')
</body>
</html>
