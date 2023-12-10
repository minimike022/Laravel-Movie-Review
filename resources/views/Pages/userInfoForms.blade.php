<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <form method="post" action="{{route('users.store')}}">
            @csrf
            <input type="hidden" name='id' value="{{Auth::id()}}">
            <div class="flex flex-col w-screen justify-center">
                <!-- First Layer -->
                <div class="flex justify-between w-[20em]">
                    <input type="text" name="First_Name" placeholder="First Name:" required>
                    <input type="text" name="Last_Name" placeholder="Last Name:" required>
                    <input type="text" name="Middle_Name" placeholder="Middle Name:" required>
                </div>
                <!-- Second Layer -->
                <div class="flex justify-between w-[20em]">
                    <input type="radio" name="Gender" value="Male" placeholder="Gender:">
                    <input type="radio" name="Gender" value="Female" placeholder="Gender:">
                    <input type="date" name="birthdate" placeholder="Birthday:" required>
                    <input type="text" name="address" placeholder="Address:" required>
                </div>
                <input type="Submit" name="Submit" value="Submit">
                
            </div>
        </form>
    </div>
</body>

</html>