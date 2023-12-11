<!DOCTYPE html>
<html lang="en">
<head>
@vite('resources/css/app.css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="bg-black overflow-x-hidden">
<div class="w-screen h-[4em] px-[3em] m-4 flex justify-between items-center text-white">
        <!-- Navbar -->
        <div class="flex w-[20em] justify-between items-center text-white">
            <a href="/users" class="text-xl font-extrabold">Home</a>
            <a href="" class="text-xl font-extrabold">Movies</a>
            <a href="/user/reviews" class="text-xl font-extrabold">Reviews</a>
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
            <a href="/login">
                <div class="bg-white border-2 h-[2.5em] w-[6em] flex justify-center items-center rounded-lg">
                    <h1 class="text-lg text-black font-bold">Sign In</h1>
                </div>
            </a>
        </div>
    </div>

    <!-- Upper Part -->
    <div class="text-white">
        <img src="{{asset($movies->moviePhoto)}}" class="w-screen h-[30em]" alt="fsdsfsdaawd">
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
    <div class="m-[4em]">
        @if(Auth::user())
        <form method="POST" action="{{route('reviews.store')}}" class="text-white">
            @csrf
            <input type="hidden" name="userID" value="{{Auth::id()}}">
            <input type="hidden" name="movieID" value="{{$movies->movieID}}">
            <input type="text" name="rating">
            <input type="text" name="reviews">
            <input type="submit" name="submit" id="submit">
        </form>
        @endif
    </div>

    <h1 class="text-white m-4 text-4xl font-bold">Reviews</h1>
    <div class="text-white">
        <table class="w-screen">
            <tr class="flex flex-col items-center">
                @foreach ($review as $reviews)
                <td class="flex justify-start bg-blue-500 h-[10em] w-[70em] m-4">
                    {{$reviews->First_Name}}
                    {{$reviews->reviews}}
                    {{$reviews->rating}}
                </td>
                @endforeach
            </tr>
        </table>
    </div>
</body>
</html>