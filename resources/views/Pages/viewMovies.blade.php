<!DOCTYPE html>
<html lang="en">

<head>
    @vite('resources/css/app.css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="bg-black overflow-x-hidden">
    <!-- if user is login -->
    @if(Auth::check())
    <div class="w-screen h-[4em] px-[3em] m-4 flex justify-between items-center text-white">
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
            <a href="/userLogout">
                <div class="bg-white border-2 h-[2.5em] w-[6em] flex justify-center items-center rounded-lg">
                    <h1 class="text-lg text-black font-bold">Sign Out</h1>
                </div>
            </a>
        </div>
    </div>
    @elseif (!Auth::check())
    <div class="w-screen h-[4em] px-[3em] m-4 flex justify-between items-center text-white">
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
                <div class="bg-white border-2 h-[2.5em] w-[6em] flex justify-center items-center rounded-lg">
                    <h1 class="text-lg text-black font-bold">Sign In</h1>
                </div>
            </a>
        </div>
    </div>
    @endif


    <!-- Upper Part -->
    <div class="text-white">
        <img src="{{asset($movies->moviePhoto)}}" class="w-screen h-[30em] rounded-e-md rounded-b-md" alt="fsdsfsdaawd">
        <!--text Contentes-->
        <div class="m-10">
            <h1 class="text-white text-7xl font-bold">{{$movies->movieTitle}}</h1>
            <h1 class="text-white text-2xl font-bold">Release Date: {{$movies->movieDate}}</h1>
            <h1 class="text-white text-2xl font-bold">Genre: {{$movies->movieGenre}}</h1>
        </div>
        <!-- Description -->
        <div class="flex justify-center">
            <h1 class="text-xl">{{$movies->movieDescription}}</h1>
        </div>
    </div>
    <!-- Movie Review -->
    
    <h1 class="text-white m-4 text-4xl font-bold">Reviews</h1>
    <div class="text-white">
        <table class="w-screen">
            <tr class="flex flex-col items-center">
                @foreach ($review as $reviews)
                <td class="flex flex-col justify-start bg-gray-900 rounded-lg h-[10em] w-[70em] m-4 p-5">
                    <div class="flex">
                        <h1 class="font-bold text-xl">{{$reviews->First_Name}}</h1>
                        <div class="w-screen flex justify-end">
                            <h2 class="text-xl">{{$reviews->rating}} </h2>
                        </div>
                    </div>
                    <p class="m-4">{{$reviews->reviews}} </p>
                </td>
                @endforeach
            </tr>
        </table>
    </div>

    @if(Auth::check())
    <h1 class="m-4 text-white text-4xl font-bold">Write a review</h1>
    <div class="ml-[4em] w-screen flex">
        <form method="POST" action="{{route('reviews.store')}}" class="text-white flex flex-col ">
            @csrf
            <div class="flex justify-between items-center w-[15em] m-4">
                <h1 class="text-xl font-bold">Rate Us</h1>
                <span class="flex flex-col items-center text-xl font-bold">
                <label for="rating">1</label>
                <input type="radio" name="rating" value="1">
                </span>
                <span class="flex flex-col items-center text-xl font-bold">
                <label for="rating">2</label>
                <input type="radio" name="rating" value="2">
                </span>
                <span class="flex flex-col items-center text-xl font-bold">
                <label for="rating">3</label>
                <input type="radio" name="rating" value="3">
                </span>
                <span class="flex flex-col items-center text-xl font-bold">
                <label for="rating">4</label>
                <input type="radio" name="rating" value="4">
                </span>
                <span class="flex flex-col items-center text-xl font-bold">
                <label for="rating">5</label>
                <input type="radio" name="rating" value="5">
                </span>
            </div>
            <input type="hidden" name="userID" value="{{Auth::id()}}">
            <input type="hidden" name="movieID" value="{{$movies->movieID}}">
            <input type="text" name="reviews" class="h-[10em] w-[70em] bg-[#808080] border-gray-200 border-2 rounded-lg mb-4">
            <span class="w-inherit mb-10">
                <input type="submit" name="submit" id="submit" class="bg-green-500 h-[2em] w-[8em] text-xl font-bold rounded-lg">
            </span>
        </form>
    </div>
    @endif
</body>

</html>