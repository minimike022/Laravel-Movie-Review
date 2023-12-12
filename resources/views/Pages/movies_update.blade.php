<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body class="overflow-y-hidden">
    @if(Auth::check())
    <div class="w-screen h-[4em] px-[3em] mt-4 flex justify-end items-center">
        <div class="w-[11em] items-center flex justify-between">
            <a href="/admin" class="text-xl font-semibold">Admin</a>
            <!-- Sign In -->
            <a href="/userLogout">
                <div class="bg-black border-2 h-[2.5em] w-[6em] flex justify-center items-center rounded-lg">
                    <h1 class="text-lg text-white font-bold">Sign Out</h1>
                </div>
            </a>
        </div>
    </div>
    @endif

    <div class="ml-10">
        <div>
            <h1 class="text-4xl mt-5 mb-5 font-bold">Update Movies</h1>
        </div>
        <form method="post" action="{{route('movies.update', $movies->movieID)}}"
            class="ml-4 flex w-[60em] justify-between">
            @csrf
            @method('put')
            <input type="text" name="movieTitle" value="{{$movies->movieTitle}}"
                class="border-black border-2 rounded-lg">
            <input type="text" name="movieDescription" value="{{$movies->movieDescription}}"
                class="border-black border-2 rounded-lg">
            <input type="date" name="movieDate" value='{{$movies->movieDate}}' class="border-black border-2 rounded-lg">
            <input type="text" name="movieGenre" value='{{$movies->movieGenre}}'
                class="border-black border-2 rounded-lg">
            <input type="submit" name="submit" placeholder="submit"
                class="bg-green-400 h-[2.5em] w-[8em] rounded-lg text-white font-bold">
        </form>
    </div>

    <div class=" mt-20 h-screen bg-black">

    </div>


</body>

</html>