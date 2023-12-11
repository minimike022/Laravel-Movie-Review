<!DOCTYPE html>
<html lang="en">

<head>
    @vite('resources/css/app.css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Document</title>
</head>

<body class="font-Poppins overflow-x-hidden">
    <!-- Navbar -->
    <div class="w-screen h-[4em] flex justify-end items-center shadow-xl shadow-gray-200">
        <form action="">
            @csrf
            <input type="text" name="search" id="search" placeholder="Search:"
                class="h-[2em] w-[15em] focus:outline-red-500 border-black rounded-lg">
        </form>
        <div class="flex items-center justify-between w-[14em] mx-[4em]">
            <h1 class="text-xl">Hi! {{Auth::user()->name}}</h1>
            <!-- Logout Button -->
            <a href="adminlogout">
                <div class="bg-black border-2 h-[2.5em] w-[6em] flex justify-center items-center rounded-lg">
                    <h1 class="text-sm text-white font-bold">Sign Out</h1>
                </div>
            </a>
        </div>
    </div>

    <!-- Add Movies -->
    <div class=" w-screen flex justify-center flex-col items-center">
        <h1 class="text-4xl m-4">Insert Movies</h1>
        <form method="post" action="{{route('movies.store')}}" enctype='multipart/form-data' class="flex justify-around w-[55em]">
            @csrf
            <div class="flex flex-col h-[15em]">
            <input type="text" name="movieTitle" placeholder="Title" class="w-[23em] rounded-md text-lg font-bold">
            <input type="text" name="movieDescription" placeholder="Description" class="w-[23em] h-[8.2em] rounded-md text-lg font-bold mt-4">
            </div>

            <div class="flex flex-col">
            <input type="date" name="movieDate" placeholder="Release Date" class="w-[23em] rounded-md text-lg">
            <input type="text" name="movieGenre" placeholder="Genre" class="w-[23em] rounded-md text-lg font-bold mt-4">
            <input type="file" name="moviePhoto" class="w-[23em] rounded-md text-lg mt-4">
            <input type="submit" name="submit" class="w-[23em] rounded-md text-lg text-white font-bold bg-green-400 mt-4 h-[2em]">
            </div>
            
        </form>
        
    </div>

    <h1 class="text-6xl ml-5 font-extrabold">Movies</h1>
    <div class="flex justify-center">
        <table class="flex justify-start flex-wrap w-[70em]">
            <tr class="flex justify-between w-[50em] flex-wrap" id="moviePlace">
                @foreach ($movies as $movie)
                <td class="flex flex-col justify-center items-center mt-10"><img src="{{$movie->moviePhoto}}" alt=""
                        class="h-[10em] w-[15em] rounded-lg">
                    {{$movie->movieTitle}}
                    <div class="flex justify-between w-[13em]">
                        <a href="movies/{{$movie->movieID}}/edit"
                            class="bg-blue-500 border-2 h-[2.5em] w-[6em] flex justify-center items-center rounded-lg text-white font-bold">Update</a>
                        <form action="{{route('movies.destroy', $movie->movieID)}}" method='post'>
                            @csrf
                            @method('delete')
                            <button type='submit'
                                class="bg-red-500 border-2 h-[2.5em] w-[6em] flex justify-center items-center rounded-lg text-white font-bold">Delete</button>
                        </form>

                    </div>
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
            url: "adminSearch",
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