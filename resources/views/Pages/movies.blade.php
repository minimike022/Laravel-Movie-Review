<!DOCTYPE html>
<html lang="en">

<head>
    @vite('resources/css/app.css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body class="overflow-x-hidden">
    @if(Auth::check())
    <div class="w-screen h-[4em] px-[3em] m-4 flex justify-between items-center">
        <!-- Navbar -->
        <div class="flex w-[20em] justify-between items-center">
            <a href="/users" class="text-xl font-extrabold hover:text-2xl hover:text-red-500">Home</a>
            <a href="{{route('movies.index')}}"
                class="text-xl font-extrabold hover:text-2xl hover:text-red-500">Movies</a>
            <a href="/user/reviews" class="text-xl font-extrabold hover:text-2xl hover:text-red-500">Reviews</a>
        </div>
        <!--Search Bar-->
        <div class="mr-6">
                @csrf
                @method('POST')
                <input type="text" id="search" name='search' placeholder="Search"
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
    <div class="w-screen h-[4em] px-[3em] m-4 flex justify-between items-center">
        <!-- Navbar -->
        <div class="flex w-[20em] justify-between items-center">
            <a href="/users" class="text-xl font-extrabold hover:text-2xl hover:text-red-500">Home</a>
            <a href="{{route('movies.index')}}"
                class="text-xl font-extrabold hover:text-2xl hover:text-red-500">Movies</a>
            <a href="/user/reviews" class="text-xl font-extrabold hover:text-2xl hover:text-red-500">Reviews</a>
        </div>
        <!--Search Bar-->
        <div class="mr-6">
                @csrf
                @method('POST')
                <input type="text" id="search" name="search" placeholder="Search"
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
                <div class="bg-black border-2 h-[2.5em] w-[6em] flex justify-center items-center rounded-lg">
                    <h1 class="text-lg text-white font-bold">Sign In</h1>
                </div>
            </a>
        </div>
    </div>
    @endif

    <div>
        <table class="ml-[2em] flex justify-start">
            <tr class="flex flex-wrap w-[60em]" id="moviePlace">
                @foreach($movies as $movie)  
                <td class="flex flex-col items-center">
                <a href="movies/viewMovies/{{$movie->movieID}}">
                    <div>
                        <img src="{{asset($movie->moviePhoto)}}" class="h-[15em] w-[17em] backdrop-blur-lg" alt="">
                        <div
                            class="absolute bg-black h-[15em] w-[17em] top-[6em] opacity-0 hover:opacity-70 text-white flex justify-center items-center">
                            <h1 class="text-xl font-bold">{{$movie->movieTitle}}</h1>
                        </div>
                    </div>
                    </a>
                </td>
                @endforeach
            </tr>
        </table>
    </div>



</body>

<script>
    $(document).ready(function() {
        $('#search').on('keyup', function() {
        var searchVal = $(this).val();
        
        $.ajax({
            url: "search",
            method: 'GET',
            data: {
                searchValue:searchVal,
            },
            success:function(result) {
                $('#moviePlace').html(result)
            }

        })
    });
    })
</script>

</html>