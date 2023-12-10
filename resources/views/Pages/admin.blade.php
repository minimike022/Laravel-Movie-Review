<!DOCTYPE html>
<html lang="en">

<head>
    @vite('resources/css/app.css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="font-Poppins overflow-x-hidden">
    <!-- Navbar -->
    <div class="w-screen h-[4em] flex justify-end shadow-xl shadow-gray-200">
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

    <!-- Buttons -->
    <div class='w-screen flex justify-center'>
        <div class="m-[1em] w-[60em] flex justify-between items-center">
            <h1 id="headerText" class="text-2xl font-bold">Users</h1>
            <div class="flex items-center justify-between w-[30em]">
                <form action="">
                    @csrf   
                    <input type="text" name="search" id="search" placeholder="Search:" class="h-[2em] w-[15em] focus:outline-red-500 border-black rounded-lg">
                </form>
                <button class="bg-black border-2 h-[3em] w-[7em] flex justify-center items-center rounded-lg">
                    <h1 class="text-white text-lg font-bold">Users</h1>
                </button>
                <button class="bg-black border-2 h-[3em] w-[7em] flex justify-center items-center rounded-lg">
                    <h1 class="text-white text-lg font-bold">Movies</h1>
                </button>
            </div>
        </div>
    </div>


    <!-- Users -->
    <div id="userModal" class="w-screen flex justify-center">
        <div class="h-[25em] p-10 bg-gray-200 shadow-lg shadow-gray-300">
            <div class="h-[20em] w-[60em] overflow-y-scroll">
                <table class="w-full text-center">
                    <thead class="">
                        <tr class="text-xl font-bold">
                            <td>First Name</td>
                            <td>Last Name</td>
                            <td>Middle Name</td>
                            <td>Gender</td>
                            <td>Birthday</td>
                            <td>Address</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    @foreach($users as $user)
                    <tbody>
                        <tr>
                            <td>{{$user->First_Name}}</td>
                            <td>{{$user->Last_Name}}</td>
                            <td>{{$user->Middle_Name}}</td>
                            <td>{{$user->Gender}}</td>
                            <td>{{$user->birthday}}</td>
                            <td>{{$user->address}}</td>
                            <td><Button>Update</Button>
                                <Button>Delete</Button>
                            </td>
                        </tr>
                    </tbody>

                    @endforeach
                </table>
            </div>
        </div>
    </div>

</body>
<script>
    var headerText = document.getElementById('headerText');
    headerText.textContent = "Movies";
</script>
</html>