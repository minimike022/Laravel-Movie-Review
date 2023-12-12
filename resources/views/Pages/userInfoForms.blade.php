<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    @if(Auth::check())
    <div class="w-screen h-[4em] px-[3em] mt-4 flex justify-end items-center">
        
            <!-- Sign In -->
            <a href="/userLogout">
                <div class="bg-black border-2 h-[2.5em] w-[6em] flex justify-center items-center rounded-lg">
                    <h1 class="text-lg text-white font-bold">Sign Out</h1>
                </div>
            </a>
    </div>
    @endif
    <div class="w-screen flex justify-center flex-col items-center">
        <div class="m-10">
            <h1 class="text-4xl font-bold">Personal Information</h1>
        </div>
        <div class="">
            <form method="post" action="{{route('users.store')}}" class="flex">
                @csrf
                <input type="hidden" name='id' value="{{Auth::id()}}">
                <div class="flex flex-col w-screen justify-center items-center">
                    <!-- First Layer -->
                    <div class="flex justify-between w-[65em]">
                        <input type="text" name="First_Name" placeholder="First Name:" class="w-[20em] border-2 border-black rounded-md" required>
                        <input type="text" name="Last_Name" placeholder="Last Name:" class="w-[20em] border-2 border-black rounded-md" required>
                        <input type="text" name="Middle_Name" placeholder="Middle Name:" class="w-[20em] border-2 border-black rounded-md" required>
                    </div>
                    <!-- Second Layer -->
                    <div class="flex justify-between w-[65em] mt-5">
                        <input type="date" name="birthdate" placeholder="Birthday:" class="w-[20em] border-2 border-black rounded-md" required>
                        <input type="text" name="address" placeholder="Address:" class="w-[20em] border-2 border-black rounded-md" required>
                        <div class="flex flex-col items-start w-[20em]">
                            <span>
                                <input type="radio" name="Gender" value="Male"  placeholder="Gender:">
                                <label for="Gender" class="text-lg font-semibold">Male</label>
                            </span>

                            <span>
                                <input type="radio" name="Gender" value="Female" ">
                                <label for=" Gender" class="text-lg font-semibold">Female</label>
                            </span>


                        </div>
                    </div>
                    <div class="w-[65em] flex justify-end">
                        <input type="Submit" name="Submit" class="mt-5 bg-green-300 h-[2em] w-[16em] rounded-lg text-xl text-white font-bold" value="Submit">
                    </div>

                </div>
            </form>
        </div>
    </div>
</body>

</html>