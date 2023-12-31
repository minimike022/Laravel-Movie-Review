<!DOCTYPE html>
<html lang="en">

<head>
    @vite('resources/css/app.css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="font-Poppins overflow-x-hidden">
    <!-- if user is login -->
    @if(Auth::check())
    <div class="w-screen h-[4em] px-[3em] mt-4 flex justify-between items-center">
        <!-- Navbar -->
        <div class="flex w-[20em] justify-between items-center">
            <a href="/users" class="text-xl font-extrabold hover:text-2xl hover:text-red-500">Home</a>
            <a href="{{route('movies.index')}}" class="text-xl font-extrabold hover:text-2xl hover:text-red-500">Movies</a>
            <a href="/user/reviews" class="text-xl font-extrabold hover:text-2xl hover:text-red-500">Reviews</a>
        </div>
        <!--Search Bar-->
        <div class="mr-6">
            <form action="">
                @csrf
                @method('POST')
                <input type="text" placeholder="Search"
                    class="focus:outline-red-500 focus:border-none border-black border-2 w-[15em] h-[2em] rounded-md pl-4">
            </form>
        </div>
        <!-- Buttons -->
        <div class="flex">
            <!-- Register -->
            <div class="h-[2.5em] w-[6em] flex items-center">
                <a href="/register">
                    <h1 class="text-lg font-bold">Register</h1>
                </a>
            </div>
            <!-- Sign In -->
            <a href="/userLogout">
                <div class="bg-black border-2 h-[2.5em] w-[6em] flex justify-center items-center rounded-lg">
                    <h1 class="text-lg text-white font-bold">Sign Out</h1>
                </div>
            </a>
        </div>
    </div>
    @elseif (!Auth::check())
    <div class="w-screen h-[4em] px-[3em] mt-4 flex justify-between items-center">
        <!-- Navbar -->
        <div class="flex w-[20em] justify-between items-center">
            <a href="/users" class="text-xl font-extrabold hover:text-2xl hover:text-red-500">Home</a>
            <a href="{{route('movies.index')}}" class="text-xl font-extrabold hover:text-2xl hover:text-red-500">Movies</a>
            <a href="/user/reviews" class="text-xl font-extrabold hover:text-2xl hover:text-red-500">Reviews</a>
        </div>
        <!-- Buttons -->
        <div class="flex">
            <!-- Register -->
            <div class="h-[2.5em] w-[6em] flex items-center">
                <a href="/register">
                    <h1 class="text-lg font-bold">Register</h1>
                </a>
            </div>
            <!-- Sign In -->
            <a href="/login">
                <div class="bg-black border-2 h-[2.5em] w-[6em] flex justify-center items-center rounded-lg">
                    <h1 class="text-lg text-white font-bold">Sign In</h1>
                </div>
            </a>
        </div>
    </div>
    @endif


    <!-- Lower Content -->
    <div class="flex flex-col justify-between h-[4em] text-6xl font-extrabold mt-[2em] ml-[1em]">
        <h1>Discover countless</h1>
        <h1> Movies </h1>
        <h1> and TV Programs </h1>
    </div>

    <!-- Lower Content -->
    <div class="w-screen flex items-center justify-center h-[8em] bg-black mt-[10em] p-[3em] text-white">
        <div class="w-screen flex justify-center">
            <h1 class="text-3xl">Watch your favorite Movies and TV Shows...</h1>
        </div>
    </div>
    <div class="flex justify-center items-center">
        <div class="h-[4em] w-[40em] flex justify-between items-center">
            <h1 class="text-2xl font-bold">Netflix</h1>
            <h1 class="text-2xl font-bold">Prime</h1>
            <h1 class="text-2xl font-bold">Disney+</h1>
            <h1 class="text-2xl font-bold">HBO Go</h1>
            <h1 class="text-2xl font-bold">Fox Movies</h1>
        </div>
    </div>

    <div class="bg-black h-[8em] text-white flex items-center justify-center">
        <div>
        <h1 class="text-2xl font-bold">Discover What Other People Likes</h1>
        </div>
    </div>
</body>

</html>