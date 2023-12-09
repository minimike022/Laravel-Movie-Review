<!DOCTYPE html>
<html lang="en">

<head>
    @vite('resources/css/app.css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="font-Poppins">
    <div class="w-screen h-[4em] px-[3em] flex justify-between items-center">
        <!-- Navbar -->
        <div class="flex w-[15em] justify-between items-center">
            <a href="" class="text-xl font-extrabold">Home</a>
            <a href="" class="text-xl font-extrabold">Movies</a>
            <a href="" class="text-xl font-extrabold">Reviews</a>
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
                <h1 class="text-lg font-bold">Register</h1>
            </div>
            <!-- Sign In -->
            <div class="bg-black border-2 h-[2.5em] w-[6em] flex justify-center items-center rounded-lg">
                <h1 class="text-lg text-white font-bold">Sign In</h1>
            </div>
        </div>
    </div>

    <!-- Lower Content -->
    <div class="flex flex-col justify-between h-[4em] text-5xl font-extrabold mt-[2.5em] ml-[1em]">
        <h1 class="text-6xl">Discover countless</h1>
        <h1> Movies </h1>
        <h1> and TV Programs </h1>
    </div>
    <div class="w-full flex justify-center absolute top-[30em]">
        <a href=""><img src="{{ URL('media/downarrow.png') }}" alt="" class="h-[4em] w-[4em]"></a>
    </div>
</body>

</html>